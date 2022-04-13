@extends('layouts.admindash')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item" style="font-size:18px;font-weight:bold" aria-current="page">Admin Dashboard</li>
    <li class="breadcrumb-item active" style="font-size:18px;font-weight:bold" aria-current="page">All Programs</li>
  </ol>
@endsection

@section('content')
  <section class="card no-border rounded shadow-sm mt-3" x-data="{ showform: false,}">
    <section class="card-body">

      <a @click="showform = !showform" class="btn btn-dark">Add New Program</a>
      <section class="mt-3" x-show="showform">
        <x-create-program-form></x-create-program-form>
      </section>
   
      <table class="table mt-3">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Degree</th>
            <th scope="col">Type</th>
            <th scope="col">Duration</th>
            <th scope="col">Points</th>
            <th scope="col">Requirements</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($programs as $program)
            <tr>
              <th scope="row">{{$program->id}}</th>
              <td>{{$program->name}}</td>
              <td>{{$program->degree}}</td>
              <td>{{$program->type}}</td>
              <td>{{$program->duration}}</td>
              <td>{{$program->min_points}}</td>
              <td>@if($program->requirements_count == 0)
                    <a  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#prog{{$program->id}}">Add Requirements</a>
                  @else
                  <a  class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#prog{{$program->id}}">Add More</a>
                    <a data-bs-toggle="modal" data-bs-target="#req{{$program->id}}" class="btn btn-info">View</a>
                  @endif
              </td>
              <td>
                <a href="/admin/program/{{$program->id}}/edit" class="btn btn-warning">Edit</a>
                <form style="display: inline" action="/admin/program/{{$program->id}}/delete" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </td>
            </tr>
            
            <x-requirements-list name="{{$program->name}}" digit="{{$program->id}}" id="req{{$program->id}}"></x-requirements-list>
            <x-requirement-modal name="{{$program->name}}" digit="{{$program->id}}" id="prog{{$program->id}}"></x-requirement-modal>
          @endforeach

        </tbody>
      </table>

    </section>
  </section>
@endsection