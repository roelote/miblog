@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h1 class="text-uppercase text-center">editar Post :  {{$post->title}} </h1>

                    <form method="POST" action=" {{route('post.update', $post->id)}} " enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                            <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{$post->title}}"/>
                            </div>
                            <div class="form-group">
                                <label for="slug">Url :</label>
                                <input type="text" class="form-control" name="slug" value="{{$post->slug}}"/>
                            </div>

                            <div class="form-group">
                                <label for="category">Seleccione Categoria</label>
                                <select class="form-control" id="category" name="category">
                                    @foreach($category as $cat)
                                    <option value="{{ $cat->id }}" {{ $post->category_id == $cat->id ? 'selected' : '' }}
                                        >{{$cat->title}}</option>

                                    @endforeach
            
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="excerpt">excerpt</label>
                                {{-- <textarea class="description" name="description"></textarea> --}}
                                <textarea class="form-control mb-2" id="excerpt" name="excerpt" cols="30" rows="5">{{$post->excerpt}}</textarea>
                                
                              </div> 


                            <div class="form-group">
                                <label for="content">Content</label>
                                <textarea class="form-control mb-2" id="content" name="content" cols="30" rows="10">{{$post->content}}</textarea>
                            </div>
                
                            <div class="form-group">
                                <img src="{{$post->image_url}} " alt="" width="100" class="d-block">
                                <label for="image_url">Imagen:</label>

                                <input type="file" class="form-control-file" name="image_url" id="image_url">
                            </div>

                            <div class="form-group">   
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="publicado" value="1" name="state" class="custom-control-input" {{ $post->state == 1 ? ' checked="" ' : '' }} >
                                    <label class="custom-control-label" for="publicado" >Publicado</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="nopublicado" value="0" name="state" class="custom-control-input" {{ $post->state == 0 ? ' checked="" ' : '' }}>
                                    <label class="custom-control-label" for="nopublicado">No Publicado</label>
                                </div>
                            </div>


                    <button type="submit" class="btn btn-primary">actualizar</button>
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

 @section('scripts')

<script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
  
<script>
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
  };
</script> 
<script>
    CKEDITOR.replace('excerpt', options);
    CKEDITOR.replace('content', options);
</script>  

@endsection
