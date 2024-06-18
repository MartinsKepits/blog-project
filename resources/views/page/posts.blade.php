@extends('layout.default')

@section('content')
    <div class="posts-wrapper container-lg mt-5">
        <h1 class="h3 pb-3 border-bottom border-2 border-black-50"><?= __('Posts') ?></h1>

        <div class="container-fluid p-0 mt-4">
            <div class="row g-2">
                @foreach ($posts as $post)
                    <div class="col-12 col-lg-6">
                        <div class="p-3 card bg-white h-100 p-4">
                            <div class="card-body position-relative p-0 pb-5">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $post->author }}</h6>
                                <p class="card-text">{{ $post->description }}</p>

                                <div class="d-flex justify-content-between align-items-center position-absolute w-100 bottom-0 start-0">
                                    <a href="{{ route('post', $post->id) }}" class="card-link"><?= __('Read Full Post') ?></a>
                                    <x-post-avg-rating :rating="$post->averageRating()" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
