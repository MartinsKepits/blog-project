@extends('layout.default')

@section('content')
    <div class="post-wrapper container-lg mt-5">
        <h1 class="h3">{{ $post->title }}</h1>
        <h2 class="h4 pb-3 mb-4 border-bottom border-2 border-black-50 text-muted">{{ $post->author }}</h2>
        <p>{{ $post->description }}</p>
    </div>
@stop
