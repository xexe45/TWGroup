@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($publications as $publication)
                <div class="card publicacion mt-2">
                    <div class="card-body">
                        <div class="cabecera">
                            <img src="{{asset('imgs/man.png')}}" class="img-fluid" alt="">
                            <p class="cabecera-titulo">Publicado por {{$publication->user->name}} {{$publication->created_at->diffForHumans()}}</p>
                        </div>
                        <div class="contenido">
                            <h2 class="contenido-titulo">{{$publication->title}}</h2>
                            <p class="contenido-parrafo">
                                {{$publication->content}}
                            </p>
                        </div>
                        <div class="pie">
                            <p class="comentarios">
                                <a href="{{route('publications.comments.index', $publication->id)}}">
                                   <i class="fa fa-comment"></i> {{$publication->comments_count}} Comentarios
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
           <div class="mt-2">
                {{ $publications->links() }}
           </div>
        </div>
        
    </div>
</div>
@endsection
