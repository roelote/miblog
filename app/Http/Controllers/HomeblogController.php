<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class HomeblogController extends Controller
{

    public function index()
    {
        //falta optimizar consulta

        $post =  Post::orderBy('id', 'desc')->where('state','1')->paginate(3);
        $category = Category::all();

        return view('blog.index',compact('post','category'));
    }

    public function show($slug)
    {
        $slug = Post::where('slug','=', $slug)->firstOrFail();
        return view('blog.show',compact('slug'));
    }

    public function category($slug)
    {
            $category = Category::where('slug',$slug)->pluck('id')->first();

            $post = Post::where('category_id',$category)->get();

        $categoryname = Category::where('slug',$slug)->pluck('title')->first();

        return view('blog.categoryshow',compact('post','categoryname'));
    }


}
