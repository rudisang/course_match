@extends('layouts.dashboard')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item" style="" aria-current="page">Dashboard</li>
    <li class="breadcrumb-item" style="" aria-current="page">My Grades</li>
    <li class="breadcrumb-item active" style="" aria-current="page">Create</li>
  </ol>
@endsection

@section('content')
  <section class="mt-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card no-border rounded shadow-sm">
            <div class="card-header">
              <h4>Add Grades</h4>
            </div>
            <div class="card-body">
              <form action="{{ route('storegrades') }}" method="post">
                @csrf
                <section x-data="{ open: false, sda: true, subjects:[ {subject:'Mathematics',selected:false}, 
                {subject:'Additional Mathematics',selected:false}, 
                {subject:'Chemistry',selected:false}, 
                {subject:'Biology',selected:false}, 
                {subject:'Physics',selected:false},
                {subject:'English', selected:false},
                {subject:'Setswana', selected:false},
                {subject:'SDA', selected:false}, 
                {subject:'Geography',selected:false}, 
                {subject:'History', selected:false}, 
                {subject:'French',selected:false}, 
                {subject:'Art',selected:false}, 
                {subject:'Music',selected:false}, 
                {subject:'Religious Education',selected:false},
                {subject:'Business Studies', selected:false}, 
                {subject:'Agriculture', selected:false}, 
                {subject:'Commerce',selected:false}, 
                {subject:'Accounting',selected:false}, 
                {subject:'Food and Nutrition',selected:false}, 
                {subject:'Design and Technology',selected:false},
                {subject:'Computer Studies',selected:false}, 
                {subject:'Physical Education',selected:false}, 
                {subject:'Fashion and Fabrics',selected:false}, 
                {subject:'Social Studies',selected:false}, 
                {subject:'English Literature',selected:false}]}">
                <x-grade-fields subjectname="subject_one" gradename="grade_one"></x-grade-fields>
                <x-grade-fields subjectname="subject_two" gradename="grade_two"></x-grade-fields>
                <x-grade-fields subjectname="subject_three"  gradename="grade_three"></x-grade-fields>
                <x-grade-fields subjectname="subject_four"  gradename="grade_four"></x-grade-fields>
                <x-grade-fields subjectname="subject_five"  gradename="grade_five"></x-grade-fields>
                <x-grade-fields subjectname="subject_six"  gradename="grade_six"></x-grade-fields>
                <x-grade-fields subjectname="subject_seven"  gradename="grade_seven"></x-grade-fields>
                <x-grade-fields subjectname="subject_eight"  gradename="grade_eight"></x-grade-fields>
                <x-grade-fields subjectname="subject_nine"  gradename="grade_nine"></x-grade-fields>
                </section>


                <div class="form-group mt-3">
                  <button type="submit" class="btn btn-dark">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

<script>

</script>