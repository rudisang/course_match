@extends('layouts.admindash')
@section('breadcrumb')
    <ol class="breadcrumb mt-3" style="position:relative">
        <li class="breadcrumb-item" style="font-size:18px;font-weight:bold" aria-current="page">Admin Dashboard</li>
        <li class="breadcrumb-item" style="font-size:18px;font-weight:bold" > Programs</li>
        <li class="breadcrumb-item active" style="font-size:18px;font-weight:bold" aria-current="page">Edit Program</li>

    </ol>
@endsection
@section('content')
<div class="mt-4">
    @php
     $degrees = ['Bachelor of Science', 'Bachelor of Arts', 'Bachelor of Finance'];
     $types = ['Associate Degree', 'Bachelor\'s Degree', 'Honours Degree', 'Professional Degree'];
     $faculties = ['science', 'arts', 'finance', 'engineering', 'medicine', 'business', 'social-science', 'law', 'education'];
    @endphp
    <form action="/admin/program/{{$program->id}}/update" method="POST">
        @csrf
        @method('PATCH')
<div class="row">
    <div class="col col-sm-12 col-md-4">
      <div class="form-group">

            <select name="degree" class="form-control" required>
            <option value="" disabled>Select Degree</option>
                @foreach($degrees as $degree)
                    <option value="{{$degree}}" @if ($degree == $program->degree) selected @endif>{{$degree}}</option>
                @endforeach
            </select>
      </div>
    </div>

    <div class="col col-sm-12 col-md-4">
        <div class="form-group">
            <input name="name" value="{{$program->name}}" placeholder="Program Title" type="text" class="form-control" required>
        </div>
      </div>
    <div class="col col-sm-12 col-md-4">
      <div class="form-group">
        <select name="type" id="" class="form-control" required>
            <option value="" disabled>Select Type</option>
            @foreach($types as $type)
                <option value="{{$type}}" @if($type == $program->type)selected @endif>{{$type}}</option>
            @endforeach
            
        </select>
      </div>
    </div>
    <div class="col col-sm-12 col-md-12 mt-2 mb-2">
        <div class="form-group">
          <textarea required placeholder="Program Description" class="form-control" name="description" id="" cols="30" rows="5">{{$program->description}}</textarea>
        </div>
      </div>

      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
            <input name="duration" value="{{$program->duration}}" placeholder="Program Duration (Years)" type="number" min=2 max=6 class="form-control" required>
        </div>
      </div>

      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
            <input name="min_points" value="{{$program->min_points}}" placeholder="Minimum Entry Points" type="number" min=30 max=48 class="form-control" required>
        </div>
      </div>

      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
          <select name="faculty" id="" class="form-control" required>
              <option value="" disabled >Select Faculty</option>
              @foreach($faculties as $faculty)
                  <option value="{{$faculty}}" @if($faculty == $program->faculty) selected @endif>{{$faculty}}</option>
              @endforeach
              
          </select>
        </div>
      </div>

    <div class="col col-sm-12 mt-2">
        <div class="form-group">
          <button type="submit" class="btn btn-warning">Update Program</button>
        </div>
      </div>

  </div>

    </form>
</div>


@endsection