@extends('layout.default')

@section('content')
    <div class="top-rated-posts-wrapper container-lg mt-5">
        <h1 class="h3 pb-3 border-bottom border-2 border-black-50"><?= __('Profile') ?></h1>

        <div class="profile-info-wrapper mt-4 px-3">
            <h2 class="h4 fw-normal pb-3"><?= __('Profile info') ?></h2>

            <table class="table">
                <tbody>
                    <tr>
                        <td>Firstname</td>
                        <th scope="row">{{ $firstname }}</th>
                    </tr>
                    <tr>
                        <td>Lastname</td>
                        <th scope="row">{{ $lastname }}</th>
                    </tr>
                    <tr>
                        <td>Email address</td>
                        <th scope="row">{{ $email }}</th>
                    </tr>
                    <tr>
                        <td>User since</td>
                        <th scope="row">{{ $created_at }}</th>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="user-posts-wrapper container-fluid mt-5 py-0 px-3">
            <h2 class="h4 fw-normal pb-3"><?= __('My Posts') ?></h2>

            <div class="row g-2">
                @if(count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="col-12">
                            <div class="card bg-white">
                                <div class="card-body px-3 py-2 d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0">{{ $post->title }}</h5>

                                    <div class="d-flex align-items-center">
                                        <a href="#update-post-{{ $post->id }}" rel="modal:open" class="btn btn-secondary rounded-pill text-light me-1"><?= __('Update') ?></a>
                                        <div id="update-post-{{ $post->id }}" class="modal">
                                            <form action="{{ route('update.post') }}" id="update-post-form" method="POST" novalidate>
                                                @csrf

                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                <div class="mb-3">
                                                    <div class="form-label"><?= __('Post title') ?></div>
                                                    <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}">
                                                    <label for="title" generated="true" class="is-invalid text-danger d-block mt-2"></label>
                                                </div>
                                                <div class="mb-3">
                                                    <div class="form-label"><?= __('Post description') ?></div>
                                                    <textarea name="description" id="description" class="form-control" rows="8">{{ $post->description }}</textarea>
                                                    <label for="description" generated="true" class="is-invalid text-danger d-block mt-2"></label>
                                                </div>
                                                <button type="submit" class="btn btn-info text-white px-4 py-2 rounded-pill"><?= __('Update') ?></button>
                                            </form>
                                        </div>

                                        <a href="#delete-post-{{ $post->id }}" rel="modal:open" class="btn btn-danger rounded-pill text-light ms-1"><?= __('Delete') ?></a>
                                        <div id="delete-post-{{ $post->id }}" class="modal delete-modal">
                                            <form action="{{ route('delete.post') }}" method="POST" novalidate>
                                                @csrf

                                                <input type="hidden" name="post_id" value="{{ $post->id }}" />
                                                <p class="h5 mb-3"><?= __('Are you sure you want to delete this post?') ?></p>
                                                <button type="submit" class="d-inline-block btn btn-dark rounded-pill w-25"><?= __('Yes') ?></button>
                                                <a href="#" rel="modal:close" class="d-inline-block btn btn-dark rounded-pill ms-1 w-25"><?= __('No') ?></a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center">
                        No Posts Found
                    </div>
                @endif
                    <a href="{{ route('create.new.post') }}" class="btn btn-info rounded-pill text-light d-block w-max-content mt-4 mx-auto"><?= __('Create New Post') ?></a>
            </div>
        </div>
    </div>
@stop
