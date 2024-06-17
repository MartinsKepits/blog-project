@if (session('pageSuccessMessage'))
    <div id="page-message" class="page-message position-absolute top-0 w-100 alert alert-success rounded-0 px-0" role="alert">
        <div class="container-lg">{{ session('pageSuccessMessage') }}</div>
    </div>
@endif

@if (session('pageErrMessage'))
    <div id="page-message" class="page-message position-absolute top-0 w-100 alert alert-danger rounded-0 px-0" role="alert">
        <div class="container-lg">{{ session('pageErrMessage') }}</div>
    </div>
@endif
