@if (session('notice'))
    <div class="alert {{ session('noticeBg') }} alert-dismissible fade show" role="alert">
        {{ session('notice') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
