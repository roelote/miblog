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
        $post =  Post::all();
        return view('blog.index',compact('post'));
    }

    public function show($slug)
    {
        $slung = Post::where('slug','=', $slug)->firstOrFail();
        return view('blog.show',compact('slung'));
    }

}
