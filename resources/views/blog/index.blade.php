<h1>el blog</h1>

<ul>
    @foreach($post as $p)

<li><a href="{{route('inicio.show.inicio',$p->slug)}}">{{$p->title}}</a> - Categoria - {{$p->category->title}} </li>
        

    @endforeach
    
</ul>