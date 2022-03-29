@extends('layouts.dashboard')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item" style="font-size:18px;font-weight:bold" aria-current="page">Dashboard</li>
    <li class="breadcrumb-item " style="font-size:18px;font-weight:bold" aria-current="page">Programs</li>
    <li class="breadcrumb-item active" style="font-size:18px;font-weight:bold" aria-current="page">{{$program->name}}</li>

  </ol>
@endsection

@section('content')
    <div class="mt-2 mb-t alert alert-warning alert-dismissible fade show" role="alert">
        Hey Admin
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    
  <section class="card no-border rounded shadow-sm mt-3">
    <section class="card-body">
        <h3><strong>{{$program->name}}</strong></h3>
        <hr>
        <p><strong>{{$program->type}}</strong> <br>
            <strong>{{$program->degree}}</strong> <br>
            Candidates should expect to complete the program in <strong>{{$program->duration}}</strong> years
        </p>
        <h4><strong>Program Description</strong></h4>
        <p>{{$program->description}}</p>
        <h4><strong>Entry Requirements</strong></h4>
        <p>A minimum of <strong>{{$program->min_points}}</strong> total points is required to enroll into this program</p>
        @if($program->requirements->count() > 0)
        <h5><strong>Special Requirements</strong></h5>
          <ul>
            @foreach ($program->requirements as $requirement)
              <li>Done <strong>{{$requirement->subject}}</strong> with <strong>{{$requirement->min_points}}</strong> points or better</li>
            @endforeach
          </ul>
            
          @else
          <p style="font-weight:bold">This program has no special entry requirements</p>
        @endif
    
   
    </section>
  </section>
@endsection