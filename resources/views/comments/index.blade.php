@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
             <div class="card publicacion">
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
                        <div class="row">
                            <div class="col-md-12">
                                  <form action="{{route('publications.comments.store', $publication->id)}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <textarea 
                            class="form-control @error('content') is-invalid @enderror" 
                            name="content"
                            placeholder="Nuevo Comentario"
                            value="{{ old('content') }}" required
                            id="content"></textarea>
                            @error('content')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right">
                                    Enviar
                                </button>
                            </div>
                        </form>
                            </div>
                        </div>
                        <hr>
                        <div class="pie">
                            <p class="comentarios">
                                <a href="">
                                   <i class="fa fa-comment"></i> {{count($comments)}} Comentarios
                                </a>
                            </p>
                        </div>

                        
                        
                        <div class="comentarios">
                            @foreach ($comments as $comment)
                                <div>
                                    <h6 class="comentario-user">
                                        {{$comment->user->name}}
                                    </h6>
                                    <p class="comentario">
                                        {{$comment->content}}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                    </div>
             </div>
        </div>
    </div>
</div>
@endsection