<?php

namespace App\Http\Controllers\admin;

use App\Post;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class PostController extends Controller
{
    
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $post = Post::orderByDesc('id')->get();

        return view('admin.blog.index',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
        $category = Category::all();
         
        return view('admin.blog.create',compact('category'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // primero vamos a validar los campos que recibimos

        $datos = $request->validate([
            'title' => 'required',
            'content' =>'required',
            'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        //creamos el slug del post
        $slug = Str::slug($datos['title'], '-');

        //validamos el ingreso de imagen

        if ($request->file('image_url')) {

            $file = $request->file('image_url');
            $url_nombre_img= $file->getClientOriginalName();

            //aqui separamos la url para poder poner guiones y corregir

            $filename = pathinfo($url_nombre_img, PATHINFO_FILENAME);
            $extension = pathinfo($url_nombre_img, PATHINFO_EXTENSION);

            $corrigiendo_nombre_image = Str::slug($filename, '-');

            $image_correcta = $corrigiendo_nombre_image.'.'.$extension;

            //guardamos la url en el direcctorio y su nombre tambien

            $path = $request->file('image_url')->storeAs('uploads',$image_correcta, 'public'); 

            }

            else{
                $path = "uploads/default.jpg";
            }

             $img = Image::make(public_path('storage/'.$path))->fit(730, 340);
             $img->save();

            // ahora insertamos en la bd teniendo todo los campos

             Post::create([
                 'title' => $datos['title'],
                 'slug' => $slug,
                 'content' => $datos['content'],
                 'image_url' => '/storage/'.$path,
                 'category_id'=>$request['category']
             ]);
  
        return redirect()->route('blog.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // return $post;
       
        // return $id;

        //    return view('admin.blog.show',compact('post'));

        return view('admin.blog.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category = Category::all();

        // $post = Post::findOrFail($id);

         return view('admin.blog.edit',compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

         $datos = $request->validate([
             'title' => 'required',
             'slug' => 'required',
             'content' =>'required',
             'image_url' => 'image|mimes:jpeg,png,jpg,gif,svg'
        ]);


        if ($request->file('image_url')) {

            $file = $request->file('image_url');
            $url_nombre_img= $file->getClientOriginalName();

            //aqui separamos la url para poder poner guiones y corregir

            $filename = pathinfo($url_nombre_img, PATHINFO_FILENAME);
            $extension = pathinfo($url_nombre_img, PATHINFO_EXTENSION);

            $corrigiendo_nombre_image = Str::slug($filename, '-');

            $image_correcta = $corrigiendo_nombre_image.'.'.$extension;

            //guardamos la url en el direcctorio y su nombre tambien

            $path = $request->file('image_url')->storeAs('uploads',$image_correcta, 'public'); 

            }

            else{
                $path = "uploads/default.jpg";
            }

            $img = Image::make(public_path('storage/'.$path))->fit(730, 340);
            $img->save();

          // asignacion de valores cuando actualizas noma y esta creado la clase, como ven se pasa por parametro
          $post->title = $datos['title'];
          $post->slug = $datos['slug'];
          $post->content = $datos['content'];
          $post->image_url = '/storage/'.$path;
          $post->category_id = $request['category'];
          $post->save();

       return redirect()->route('blog.index'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('blog.index');
    }


  

}
