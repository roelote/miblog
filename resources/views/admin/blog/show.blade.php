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
                   <h1 class="text-uppercase text-center">post nombre : {{$post->title}} </h1>
                   <p>{{$post->content}}</p>
                    <img src="{{$post->image_url}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection