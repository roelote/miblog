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
                   <h1 class="text-uppercase text-center">Crear Post</h1>

                   <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                    <input type="text" class="form-control mb-2" id="title" name="title" placeholder="title">
                    </div>
        
                    <div class="form-group">
                        <label for="content">Content</label>
                        {{-- <textarea class="description" name="description"></textarea> --}}
                        <textarea class="form-control mb-2" id="content" name="content" cols="30" rows="10">
                        </textarea>
                        
                    </div>
        
                    <div class="form-group">
                      <label for="image_url">Imagen</label>
                      <input type="file" class="form-control-file" name="image_url" id="image_url">
                    </div>
        
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




