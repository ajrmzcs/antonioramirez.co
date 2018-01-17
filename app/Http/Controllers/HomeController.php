<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $year = date('Y');

        return view('home',compact('year'));
    }

    public function getPosts()
    {
        $posts = DB::table('posts')->select('id','title','excerpt', 'slug', 'updated_at')
            ->orderBy('updated_at','DESC')
            ->simplePaginate(5);

        return response()->json($posts, 200);
    }

    public function getCategories()
    {
        $categories = Category::all();

        return response()->json($categories, 200);
    }

}
