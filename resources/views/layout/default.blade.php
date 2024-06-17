@include('includes.head')
<body>
@include('includes.header')
<main class="page-main position-relative pb-5 @if (session('pageSuccessMessage') || session('pageErrMessage')) mt-header @endif">
    @include('includes.page-messages')
    @yield('content')
</main>
@include('includes.footer')
</body>
</html>
