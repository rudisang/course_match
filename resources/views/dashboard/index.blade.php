@extends('layouts.dashboard')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item active" style="font-size:24px;font-weight:bold" aria-current="page">Dashboard</li>
  </ol>
@endsection

@section('content')
  <section class="card no-border rounded shadow-sm">
    <section class="card-body">
      @if(Auth::user()->grades->count() > 0)
      <div class="mt-2 mb-t alert alert-info alert-dismissible fade show" role="alert">
        Admin Has Not Added Any Courses Yet. Check Back in a Bit.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @else
      <div class="mt-2 mb-t alert alert-warning alert-dismissible fade show" role="alert">
        Looks like you haven't added your grades yet. Click <a href="{{route('addgrades')}}" class="alert-link">here</a> to add your grades.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    </section>
  </section>
@endsection