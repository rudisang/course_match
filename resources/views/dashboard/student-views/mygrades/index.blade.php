@extends('layouts.dashboard')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item" style="" aria-current="page">Dashboard</li>
    <li class="breadcrumb-item active" style="" aria-current="page">My Grades</li>
  </ol>
@endsection

@section('content')

@if(Auth::user()->grades->count() <= 0)
  <section class="mt-2" style="height:80vh;display:flex;justify-content:center;align-items:center">
      <div style="min-width:50%;background:white;padding:30px;border-radius:10px;text-align:center !important">
        <h1>No Grades Yet!</h1>
        <a href="{{route('addgrades')}}">Click Here To Add Grades</a>
      </div>
  </section>

  @else
    @php
      $points_array = [];
      $has_sda = false;
      $total = 0;
      $sorted = Auth::user()->grades->sortByDesc('points');
     @endphp
    @foreach ($sorted as $grade)

    <div class="row mt-3">
      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
          <label for="">Subject</label>
          <select id="" class="form-control" required disabled>
            <option selected>{{$grade->subject}}</option>
          </select>
        </div>
      </div>
    
      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
          <label for="">Grade</label>
          <select name="" id="" class="form-control" required disabled>
              <option value="" selected>{{$grade->grade}}</option>
          </select>
        </div>
      </div>
    
      <div class="col col-sm-12 col-md-4">
        <div class="form-group">
          <label for="">Points</label>
          <input disabled type="number" min=0 max=8 value="{{$grade->points}}" class="form-control" placeholder="Enter Points" required>
        </div>
      </div>
    </div>

<hr>
    @endforeach

    @foreach ($sorted as $grade)
      @if($grade->subject == 'SDA')
        @php
          $has_sda = true;
        @endphp
      @endif
    @endforeach
    
    @php
      if($has_sda){
        $points_array = $sorted->splice(5);
      }else{
        $points_array = $sorted->splice(6);
      }
    @endphp

      <section class="card shadow-sm rounded no-border">
        <div class="card-body">
          <h3>Your Best 6 Subjects</h3>

          <table class="table">
            <thead>
              <tr>
                <th scope="col">Subject</th>
                <th scope="col">Grade</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($sorted as $calc )
              <tr>
                <td>{{$calc->subject}}</td>
                <td>{{$calc->grade}}</td>
              </tr>
   
              @php $total += $calc->points; @endphp
              @endforeach
            </tbody>
          </table>

        <h1 class="mt-4">Total Points: {{$total}}</h1>
        </div>
      </section>

  @endif
@endsection