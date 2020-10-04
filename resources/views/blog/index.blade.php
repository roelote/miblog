@extends('layouts.app2')


@section('section_home')
    <div class="col-md-8">

    <h1 class="my-4">NUESTRO BLOG</h1>

        <div class="container">
              @foreach($post as $p)
            <div class="card mb-4">
                <img class="card-img-top" src="{{$p->image_url}}" alt="Card image cap">
                <div class="card-body">
                <h2 class="card-title">{{$p->title}}</h2>
                <p class="card-text">{!! $p->excerpt !!}</p>
                <a href="{{route('inicio.show.inicio',$p->slug)}}" class="btn btn-primary">Read More </a>
                </div>
                <div class="card-footer text-muted">
                Category
                <a href="{{route('category.show',$p->category->slug)}}">{{$p->category->title}}</a>
                </div>
            </div>
            @endforeach
        </div>

        {{ $post->links() }}

   </div>

<div class="col-md-4">
    <!-- Search Widget -->
    <div class="card my-4">
      <h5 class="card-header">Search</h5>
      <div class="card-body">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-append">
            <button class="btn btn-secondary" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>

    <!-- Categories Widget -->
    <div class="card my-4">
      <h5 class="card-header">Categories</h5>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">

                @foreach($category as $kat)
                  <li>
                  <a href="{{route('category.show',$kat->slug)}}">{{$kat->title}}</a>
                  </li>
                @endforeach
            </ul>
          </div>
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
              <li>
                <a href="#">JavaScript</a>
              </li>
              <li>
                <a href="#">CSS</a>
              </li>
              <li>
                <a href="#">Tutorials</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!-- Side Widget -->
    <div class="card my-4">
      <h5 class="card-header">Side Widget</h5>
      <div class="card-body">
        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
      </div>
    </div>

  </div>

@endsection
