<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')
            ->orderBy('created_at', 'DESC')
            ->simplePaginate(5);

        return view('adminUsers.userList', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User(); // Empty model to be able to use one partial for create/edit

        $dbRoles = null; // Empty array to be able to use one partial for create/edit

        return view('adminUsers.create', compact('user', 'dbRoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required | min:5 | max:100',
            'email' => 'required | email | unique:users',
            'roles' => 'required | array',
            'password' => 'required | min:5 | max:20 | confirmed',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $user->roles()->attach($request->roles);

            // Save image to storage in local disk
            $path = Storage::putFile('avatar-images',$request->file('avatar'));

            // Move image to media disk and associate to model
            $user->addMedia(storage_path('app/').$path)
                ->toMediaCollection();

            return redirect()->route('admin.users.index')->with('status', 'User added');

        } catch (\Exception $e) {

            return back()->withInput()->withErrors($e->getMessage());

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = User::findOrFail($id);


        $dbRoles['admin'] = false;
        $dbRoles['author'] = false;

        foreach ($user->roles as $role) {

            if ($role->id == 1) {

                $dbRoles['admin'] = true;

            } elseif ($role->id == 2) {

                $dbRoles['author'] = true;

            }

        }

        return view('adminUsers.edit', compact('user', 'dbRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'name' => 'required | min:5 | max:100',
            'email' => ['required',
                'email',
                Rule::unique('users')->ignore($id)
            ],
            'roles' => 'required | array',
            'password' => 'required | min:5 | max:20 | confirmed'
        ]);

        try {

            $user = User::find($id);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);

            $user->save();

            $user->roles()->sync($request->roles);

            // Delete previous image if exists
            $mediaItems = $user->getMedia() ?? null;

            if (empty($mediaItems)) {
                $mediaItems[0]->delete();
            }

            // Save image to storage in local disk
            $path = Storage::putFile('avatar-images',$request->file('avatar'));

            // Move image to media disk and associate to model
            $user->addMedia(storage_path('app/').$path)
                ->toMediaCollection();

            return redirect()->route('admin.users.index')->with('status', 'User edited');

        } catch (\Exception $e) {

            return back()->withInput()->withErrors($e->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);

        return redirect()->route('admin.users.index')->with('status', 'User deleted');
    }
}
