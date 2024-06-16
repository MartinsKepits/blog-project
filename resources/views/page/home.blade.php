@extends('layout.default')

@section('content')
    <div class="hero-wrapper container-lg py-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-6">
                <img src="{{ url('images/homepage/homepage-hero.jpg') }}" class="img-fluid" alt="Blogger writes a blog">
            </div>
            <div class="col-12 col-md-6">
                <h1 class="fw-bolder"><?= __('Write blogs posts however you want.') ?></h1>
                <p><?= __('This is blog webpage project to demonstrate some of my skills. First you have to register or login and then you can create new posts and rate oders.') ?></p>
                <a href="{{ route('auth') }}" class="btn btn-info rounded-pill text-light"><?= __('Register') ?></a>
            </div>
        </div>
        <a href="#" class="text-dark fw-bold d-block mt-4 mt-md-0 text-center"><?= __('Scroll Down') ?></a>
    </div>

    <div class="top-rated-posts-wrapper container-lg mt-5">
        <h2 class="h4 fw-bold text-uppercase w-max-content mb-4">
            <?= __('Top Rated Posts') ?>
            <span class="d-block mt-1 border-bottom border-warning border-3 rounded-pill w-50"></span>
        </h2>
        <div class="container-fluid p-0">
            <div class="row g-2">
                <div class="col-12 col-lg-6">
                    <div class="p-3 card bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Post title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Firstname Lastname</h6>
                            <p class="card-text">Post text. Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="card-link"><?= __('Read Full Post') ?></a>
                                <span>Stars</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="p-3 card bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Post title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Firstname Lastname</h6>
                            <p class="card-text">Post text. Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="card-link"><?= __('Read Full Post') ?></a>
                                <span>Stars</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="p-3 card bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Post title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Firstname Lastname</h6>
                            <p class="card-text">Post text. Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="card-link"><?= __('Read Full Post') ?></a>
                                <span>Stars</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="p-3 card bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Post title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Firstname Lastname</h6>
                            <p class="card-text">Post text. Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="card-link"><?= __('Read Full Post') ?></a>
                                <span>Stars</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="p-3 card bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Post title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Firstname Lastname</h6>
                            <p class="card-text">Post text. Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="card-link"><?= __('Read Full Post') ?></a>
                                <span>Stars</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="p-3 card bg-white">
                        <div class="card-body">
                            <h5 class="card-title">Post title</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Firstname Lastname</h6>
                            <p class="card-text">Post text. Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="card-link"><?= __('Read Full Post') ?></a>
                                <span>Stars</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('create.new.post') }}" class="btn btn-info rounded-pill text-light d-block w-max-content mt-4 mx-auto"><?= __('Create New Post') ?></a>
        </div>
    </div>
@stop
