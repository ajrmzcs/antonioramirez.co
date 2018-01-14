<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminCategoryController extends Controller
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
        $categories = Category::simplePaginate(5);

        $year = date('Y');

        return view('adminCategories.categoriesList', compact('categories', 'year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category(); // Empty model to be able to use one partial for create/edit

        $year = date('Y');

        return view('adminCategories.create', compact('category', 'year'));
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
            'name' => 'required | min:5 | max:255',
        ]);

        try {

            $category = Category::create([
                'name' => $request->name,
            ]);

            return redirect()->route('admin.categories.index')->with('status', 'Category added');

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

        $category = Category::findOrFail($id);

        $year = date('Y');

        return view('adminCategories.edit', compact('category', 'year'));
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
        ]);

        try {

            $category = Category::find($id);

            $category->name = $request->name;

            $category->save();

            return redirect()->route('admin.categories.index')->with('status', 'Category edited');

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
        $category = Category::destroy($id);

        return redirect()->route('admin.categories.index')->with('status', 'Category deleted');
    }
}
