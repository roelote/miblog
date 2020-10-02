@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
               

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h1 class="text-uppercase">Category</h1>
                    <a href="{{route('category.create')}}" class="btn btn-success mb-2">Crear category</a>

                   <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Url</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $p)
                        <tr>
                            <th scope="row">{{$p->id}}</th>
                            <td> {{$p->title}} </td>
                            <td> {{$p->slug}}</td>
                            
                            <td>
                                <a href="" class="btn btn-success" >Ver</a>
                                <a href="{{route('category.edit',$p->id)}}" class="btn btn-primary" >Editar</a>

                                    {{-- <div class="d-inline-block">
                                        <form method="POST" class="inline-block" action="{{route('post.destroy',$p->id)}}">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Borrar" >
                                            </form>
                                    </div> --}}
                          </tr>
                        @endforeach
                      
                    </tbody>
                  </table>
                  
                 
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
