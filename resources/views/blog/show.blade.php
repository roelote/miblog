@extends('layouts.app2')


<section>

    <div class="container">
        @section('section_home')
            <h1 class="text-uppercase text-center">{{$slug->title}}</h1>
            <p>{{$slug->content}}</p>
            <img src="{{$slug->image_url}}" class="img-fluid" alt="">
            <h2><span>category: <a href=" {{route('category.show', $slug->category->slug)}} ">{{$slug->category->title}}</a></span></h2>
    </div>
</section>


@endsection