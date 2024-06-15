<nav class="navbar navbar-expand-lg navbar-light fixed-top border-bottom bg-white">
    <div class="container-lg">
        <a class="navbar-brand p-0" href="{{ route('home') }}">
            <img src="{{ url('images/blog-logo.jpg') }}" width="35" height="35" class="d-inline-block align-top" alt="Blog website logo">
        </a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#mainHeader" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse pt-2 pt-lg-0" id="mainHeader">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link py-0" href="{{ route('home') }}"><?= __('Home') ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link py-0" href="#"><?= __('Posts') ?></a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link py-0" href="#"><?= __('Login') ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link py-0" href="#"><?= __('Register') ?></a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item">
                        <a class="nav-link py-0" href="#"><?= __('Profile') ?></a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
