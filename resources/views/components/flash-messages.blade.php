<div>
    @if ($message = Session::get('error'))
    <div class="mt-2 mb-t alert alert-warning alert-dismissible fade show" role="alert">
      {{{$message}}}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('success'))
    <div class="mt-2 mb-t alert alert-success alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('warning'))
    <div class="mt-2 mb-t alert alert-warning alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($message = Session::get('info'))
    <div class="mt-2 mb-t alert alert-info alert-dismissible fade show" role="alert">
      {{ $message }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
</div>