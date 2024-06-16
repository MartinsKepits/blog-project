@extends('layout.default')

@section('content')
    <div class="create-post-wrapper container-lg py-3 py-md-5">
        <div class="row justify-content-center">
            <div class="bg-light rounded p-3 col-12 col-md-8">
                <h1 class="h3 pb-3 border-bottom border-2 border-black-50"><?= __('Create New Post') ?></h1>
                <form action="{{ route('create.post') }}" id="create-post-form" class="mt-3" method="POST" novalidate>
                    @csrf

                    @error('createPostErr')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                    @enderror
                    <div class="mb-3">
                        <div class="form-label"><?= __('Post title') ?></div>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                        <label for="title" generated="true" class="is-invalid text-danger d-block mt-2">
                            @error('title')
                            {{ $message }}
                            @enderror
                        </label>
                    </div>
                    <div class="mb-3">
                        <div class="form-label"><?= __('Post description') ?></div>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="8">{{ old('description') }}</textarea>
                        <label for="description" generated="true" class="is-invalid text-danger d-block mt-2">
                            @error('description')
                            {{ $message }}
                            @enderror
                        </label>
                    </div>
                    <button type="submit" class="btn btn-info text-white px-4 py-2 rounded-pill"><?= __('Create') ?></button>
                </form>
            </div>
        </div>
    </div>
@stop
