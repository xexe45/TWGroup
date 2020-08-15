@extends('layouts.auth')

@section('content')
    <div class="row justify-content-center margen-superior">
        <div class="col-md-6">
            <div class="logo">
                <img 
                    src="{{asset('imgs/reddit.png')}}" 
                    alt="{{config('app.name', 'Laravel')}}"
                    class="img-fluid">
                    <h1 class="titulo">
                        {{config('app.name', 'Laravel')}}
                    </h1>
            </div>
            <div class="bienvenida">
                <h3 class="titulo_bienvenida">
                    Bienvenido a {{config('app.name', 'Laravel')}}
                </h3>
                <p class="parrafo_bienvenida">
                   Una comunidad de publicaciones y comentarios.
                </p>
            </div>
            <div class="formulario">
                <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                           <input placeholder="Dirección de correo electrónico" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="form-group ">
                           

                           
                            <input placeholder="Clave" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>

                        

                        <div class="form-group text-center caja-boton">
                            <button type="submit" class="btn btn-primary boton">
                                {{ __('Ingresar') }}
                            </button>
                        </div>
                    </form>
            </div>

            <div class="registro">
                <p class="registrarme">
                    ¿Aún no tienes una cuenta? <a href="{{route('register')}}">Regístrate</a>
                </p>
                
            </div>
        </div>
    </div>
@endsection
