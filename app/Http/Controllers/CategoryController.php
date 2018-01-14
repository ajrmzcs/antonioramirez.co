<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
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
     * Show the application dashboard.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $year = date('Y');
        $catId = $id;

        return view('category',compact('year','catId'));
    }

    public function getPostsByCategoryId($id)
    {

        $categoryName = Category::find($id);

        $postsByCategory = DB::table('posts')
            ->select('posts.id','posts.title','posts.excerpt', 'posts.slug', 'posts.updated_at')
            ->join('category_post','posts.id', '=', 'category_post.post_id')
            ->where('category_post.category_id',$id)
            ->orderBy('updated_at','DESC')
            ->simplePaginate(5);

        $data = $postsByCategory->toArray();

        $data['category_name'] = $categoryName->name;

        return response()->json($data, 200);
    }

    public function getCategories()
    {
        $categories = Category::all();

        return response()->json($categories, 200);
    }

}
