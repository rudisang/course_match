@extends('layouts.admindash')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item active" style="font-size:24px;font-weight:bold" aria-current="page">Dashboard</li>
  </ol>
@endsection

@section('content')
  <section class="card no-border rounded shadow-sm">
    <section class="card-body">
   
      <div class="mt-2 mb-t alert alert-info alert-dismissible fade show" role="alert">
        Hey Admin
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>

    </section>
  </section>
@endsection