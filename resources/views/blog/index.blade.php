@extends('layouts.app2')


@section('section_home')

<div class="container">
    <h1>el blog</h1>

<ul>
    @foreach($post as $p)

        <li><a href="{{route('inicio.show.inicio',$p->slug)}}">{{$p->title}}</a>
                                                    - Categoria - 
         <a href="{{route('category.show',$p->category->slug)}}">{{$p->category->title}}</a>
         </li>
    
    @endforeach
    
</ul>
</div>

@endsection