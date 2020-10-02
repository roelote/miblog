<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('admin.category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $datos = $request->validate([
            'title' => 'required',
            'content' =>'required'
        ]);

        $slug = Str::slug($datos['title'], '-');

        Category::create([
            'title' => $datos['title'],
            'slug' => $slug,
            'content' => $datos['content']
        ]);

       return redirect()->route('category.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $datos = $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'content' =>'required'
       ]);

         // asignacion de valores cuando actualizas noma y esta creado la clase, como ven se pasa por parametro

         $category->title = $datos['title'];
         $category->slug = $datos['slug'];
         $category->content = $datos['content'];
         $category->save();

         return redirect()->route('category.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
