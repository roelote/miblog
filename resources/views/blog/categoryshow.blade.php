@extends('layouts.app2')



@section('section_home')


<div class="container">

<h1>Datos de la categoria : {{ $categoryname }}</h1>
    
    <ul>
        @foreach($post as $pp)

        <li><a href="{{route('inicio.show.inicio',$pp->slug)}}">{{$pp->title}}</a></li>
            
        @endforeach
    </ul>
   
</div>



@endsection