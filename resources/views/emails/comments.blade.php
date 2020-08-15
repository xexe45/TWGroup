@component('mail::message')
# Hola {{$user->name}}

Recibiste un nuevo comentario en tu publicación {{$publication->title}}

@component('mail::button', ['url' => route('publications.comments.index', $publication->id)])
Ver publicación
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
