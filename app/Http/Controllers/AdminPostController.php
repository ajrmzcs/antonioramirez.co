<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
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
        $posts = Post::with(['user','categories'])
            ->orderBy('updated_at','DESC')
            ->simplePaginate(5);

        return view('adminPosts.postsList', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = new Post(); // Empty model to be able to use one partial for create/edit

        $categories = Category::all();

        $dbCategories = [];

        return view('adminPosts.create', compact('post', 'categories', 'dbCategories'));
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
            'title' => 'required | min:5 | max:255',
            'body' => 'required | min:5',
            'excerpt' => 'required | min:5',
            'slug' => 'required | min:5 | max:100',
            'published' => 'required | boolean',
            'categories' => 'required | array',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {

            $post = Post::create([
                'title' => $request->title,
                'body' => $request->body,
                'excerpt' => $request->excerpt,
                'slug' => $request->slug,
                'published' => $request->published,
                'user_id' => auth()->user()->id,
            ]);

            $post->categories()->attach($request->categories);

            // Save image to storage in local disk
            $path = Storage::putFile('posts-images',$request->file('image'));

            // Move image to media disk and associate to model
            $post->addMedia(storage_path('app/').$path)
                ->toMediaCollection();

            return redirect()->route('admin.posts.index')->with('status', 'Post added');

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

        $post = Post::with('categories')->where('id',$id)->firstOrFail();
        $mediaItems = $post->getMedia();

//        dd($post->toArray());

        $categories = Category::all();

        $dbCategories = [];

        foreach ($post->categories as $dbCategory) {

            array_push($dbCategories,$dbCategory->id);

        }

        return view('adminPosts.edit', compact('post', 'categories', 'dbCategories'));
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
            'title' => 'required | min:5 | max:255',
            'body' => 'required | min:5',
            'excerpt' => 'required | min:5',
            'slug' => 'required | min:5 | max:100',
            'published' => 'required | boolean',
            'categories' => 'required | array',
        ]);

        try {

            $post = Post::find($id);

            $post->title = $request->title;
            $post->body= $request->body;
            $post->excerpt = $request->excerpt;
            $post->slug = $request->slug;
            $post->published = $request->published;
            $post->user_id = auth()->user()->id;

            $post->save();

            $post->categories()->sync($request->categories);

            // Delete previous image
            $mediaItems = $post->getMedia();

            $mediaItems[0]->delete();

            // Save image to storage in local disk
            $path = Storage::putFile('posts-images',$request->file('image'));

            // Move image to media disk and associate to model
            $post->addMedia(storage_path('app/').$path)
                ->toMediaCollection();

            return redirect()->route('admin.posts.index')->with('status', 'Post edited');

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
        $post = Post::destroy($id);

        return redirect()->route('admin.posts.index')->with('status', 'Post deleted');
    }
}
