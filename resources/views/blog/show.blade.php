@extends('layouts.app2')




    
        @section('section_home')
            <h1 class="text-uppercase text-center">{{$slug->title}}</h1>
            <img src="{{$slug->image_url}}" class="img-fluid my-4" alt="">
            <p>{!!$slug->content!!}</p>
            
            <h2><span>category: <a href=" {{route('category.show', $slug->category->slug)}} ">{{$slug->category->title}}</a></span></h2>




@endsection