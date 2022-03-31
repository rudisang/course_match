@extends('layouts.admindash')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item active" style="font-size:24px;font-weight:bold" aria-current="page">Dashboard</li>
  </ol>
@endsection

@section('content')
  <section class="card no-border rounded shadow-sm mt-3">
    <section class="card-body">
   
      <div class="row">
        <div class="col col-sm-12 col-md-4 mt-3">
          <div class="card no-border rounded" style="background:rgb(240, 240, 240)">
            <div class="card-body" style="text-align: center">

              <h2 class="card-title"><strong>{{$programs->count()}}</strong></h2>
              <h6 class="card-subtitle mb-2 text-muted">Programs</h6>
              
            </div>
          </div>
        </div>

        <div class="col col-sm-12 col-md-4 mt-3">
          <div class="card no-border rounded" style="background:rgb(240, 240, 240)">
            <div class="card-body" style="text-align: center">

              <h2 class="card-title"><strong>{{$users->count()}}</strong></h2>
              <h6 class="card-subtitle mb-2 text-muted">System Users</h6>
              
            </div>
          </div>
        </div>

        <div class="col col-sm-12 col-md-4 mt-3">
          <div class="card no-border rounded" style="background:rgb(240, 240, 240)">
            <div class="card-body" style="text-align: center">

              <h2 class="card-title"><strong>0</strong></h2>
              <h6 class="card-subtitle mb-2 text-muted">Applications</h6>
              
            </div>
          </div>
        </div>
      </div>

    </section>
  </section>
@endsection