<footer class="py-3 border-top">
    <div class="container-lg d-flex flex-wrap justify-content-center justify-content-md-start align-items-center">
        <p class="col-md-4 mb-0 text-muted">© 2024 Mārtiņš Ķepīts</p>
        <a href="{{ route('home') }}" class="col-12 col-md-4 d-flex align-items-center justify-content-center my-2 my-md-0 me-md-auto link-dark text-decoration-none">
            <img src="{{ url('images/blog-logo.jpg') }}" width="35" height="35" class="d-inline-block align-top" alt="Blog website logo">
        </a>
        <p class="col-md-4 mb-0 text-muted d-flex justify-content-center justify-content-md-end">
            <span><?= __('Build with')?></span> <b class="ms-1">Laravel</b>
        </p>
    </div>
</footer>
