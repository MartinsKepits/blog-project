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
                <a href="#" class="btn btn-info rounded-pill text-light"><?= __('Register') ?></a>
            </div>
        </div>
        <a href="#" class="text-dark fw-bold d-block mt-4 mt-md-0 text-center"><?= __('Scroll Down') ?></a>
    </div>
@stop
