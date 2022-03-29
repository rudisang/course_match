@extends('layouts.dashboard')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item active" style="font-size:24px;font-weight:bold" aria-current="page">Dashboard</li>
  </ol>
@endsection
@php
  $faculties = ['science', 'arts', 'finance', 'engineering', 'medicine', 'business', 'social-science', 'law', 'education'];
@endphp
@section('content')
  <section class="card no-border rounded shadow-sm mt-3">
    <section class="card-body">
      @if(Auth::user()->grades->count() > 0)
        @if($programs->count() == 0)
          <div class="mt-2 mb-t alert alert-info alert-dismissible fade show" role="alert">
            No Programs Found.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @else
            <div class="row">
              <div class="col col-sm-12 mb-3">
                <form action="" method="get" class="mb-3">
                  <div class="form-group">
                    <input type="search" name="search" placeholder="Search" class="form-control">
                  </div>
                </form>
                  @foreach ($faculties as $filter)
                  <a href="?faculty={{$filter}}" class="btn btn-filter">{{$filter}}</a>
                  @endforeach
              </div>
                @foreach ($programs as $program)
                  <div class="col col-sm-12 col-md-4">
                    <div class="card no-border rounded" style="background:rgb(240, 240, 240)">
                      <div class="card-body">
                        <h5 class="card-title"><strong>{{$program->name}}</strong></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Science</h6>
                        <p class="card-text">Min Points: {{$program->min_points}} <br/>  Duration: {{$program->duration}} years</p>
                        <a href="/dashboard/program/{{$program->id}}" class="card-link">view</a>
                      </div>
                    </div>
                  </div>
                @endforeach
            </div>
        @endif
      @else
      <div class="mt-2 mb-t alert alert-warning alert-dismissible fade show" role="alert">
        Looks like you haven't added your grades yet. Click <a href="{{route('addgrades')}}" class="alert-link">here</a> to add your grades.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
    </section>
  </section>
@endsection