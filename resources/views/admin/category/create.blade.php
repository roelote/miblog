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
                   <h1 class="text-uppercase text-center">Crear Category</h1>

                   <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="title">Title</label>
                    <input type="text" class="form-control mb-2" id="title" name="title" placeholder="title">
                    </div>
        
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control mb-2" id="content" name="content" cols="30" rows="10">
                        </textarea>
                        
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




