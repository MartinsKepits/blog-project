@extends('layout.default')

@section('content')
    <div class="post-wrapper container-lg mt-5">
        <div class="pb-3 mb-4 border-bottom border-2 border-black-50 d-flex flex-wrap justify-content-between align-items-center gap-1">
            <div>
                <h1 class="h3">{{ $post->title }}</h1>
                <h2 class="h4 text-muted">{{ $post->author }}</h2>
            </div>
            <div>
                <x-post-avg-rating :rating="$post->averageRating()" />
            </div>
        </div>

        <p>{{ $post->description }}</p>
    </div>
    <div class="position-absolute bottom-0 start-0 w-100 bg-light py-5">
        <div class="container-lg d-flex flex-column justify-content-center align-items-center">
            <div class="h5 text-center"><?= __('How should you rate this post?') ?></div>

            <form action="{{ route('post.rate', ['id' => $post->id]) }}" id="post-rating-form" class="w-max-content" method="POST">
                @csrf
                <div class="post-rating d-flex flex-row-reverse">
                    <input type="radio" id="star5" name="rating" value="5">
                    <label for="star5" title="5 stars">
                        <span class="fa fa-star"></span>
                    </label>
                    <input type="radio" id="star4" name="rating" value="4">
                    <label for="star4" title="4 stars">
                        <span class="fa fa-star"></span>
                    </label>
                    <input type="radio" id="star3" name="rating" value="3">
                    <label for="star3" title="3 stars">
                        <span class="fa fa-star"></span>
                    </label>
                    <input type="radio" id="star2" name="rating" value="2">
                    <label for="star2" title="2 stars">
                        <span class="fa fa-star"></span>
                    </label>
                    <input type="radio" id="star1" name="rating" value="1">
                    <label for="star1" title="1 star">
                        <span class="fa fa-star"></span>
                    </label>
                </div>
            </form>
        </div>
    </div>
@stop
