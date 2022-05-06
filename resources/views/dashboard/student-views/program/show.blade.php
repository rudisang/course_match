@include('scripts.points')
@extends('layouts.dashboard')
@section('breadcrumb')
  <ol class="breadcrumb mt-3" style="position:relative">
    <li class="breadcrumb-item" style="font-size:18px;font-weight:bold" aria-current="page">Dashboard</li>
    <li class="breadcrumb-item " style="font-size:18px;font-weight:bold" aria-current="page">Programs</li>
    <li class="breadcrumb-item active" style="font-size:18px;font-weight:bold" aria-current="page">{{$program->name}}</li>

  </ol>
    <span x-data="{generate:false}">
        <a x-show="!generate" @click="generate = true; setTimeout(function(){ generate = false }, 6000);" href="/dashboard/program/{{$program->id}}/download" class="btn btn-info">Generate PDF</a>
        <button x-show="generate;" class="btn btn-info" disabled>Generating... <div style="margin-top:-10px" class="loader"></div></button>
    </span>
@endsection

@section('content') 
    @if($points < $program->min_points)
    <div class="mt-2 mb-t alert alert-danger alert-dismissible fade show" role="alert">
        You Don't Have The Required POINTS To Apply For This Program.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    @else
        @php 
            $required = $program->requirements->count(); 
            $err = [];
        @endphp
        @if($program->requirements->count() > 0)

            @for ($i = 0; $i < $program->requirements->count(); $i++)
                @for ($j = 0; $j < auth()->user()->grades->count(); $j++)
                    @if($program->requirements[$i]->subject === auth()->user()->grades[$j]->subject)
                        @if(calcPoints(auth()->user()->grades[$j]->grade) >= $program->requirements[$i]->min_points)
                            @php
                                $required--;
                            @endphp
                        @endif
                    @endif
                @endfor
            @endfor
        
            @if ($required > 0)
                <div class="mt-2 mb-t alert alert-warning alert-dismissible fade show" role="alert">
                    <p>Your GCSE Points {{$points}} Meet The Requirements ({{$program->min_points}}points) To Enroll For This Program, However:</p>
                    <p>Below are the minimum requirements for this program:</p>
                    <ul>
                        @foreach ($program->requirements as $requirement)
                            <li>GCSE <strong>{{$requirement->subject}}</strong> With Grade <strong>{{calcGrade($requirement->min_points)}}</strong> - <strong>{{$requirement->min_points}}</strong> Points or Better</li>
                        @endforeach
                    </ul>
                    <p>You May Not Have Done or Met The Required Pass Mark For The Subjects Required For This Program</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @else
                <div class="mt-2 mb-t alert alert-success alert-dismissible fade show" role="alert">
                    You Qualify For This Program
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            
        @else
        <div class="mt-2 mb-t alert alert-success alert-dismissible fade show" role="alert">
            You Qualify For This Program
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    
    @endif

    
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

  <section class="mb-4">
    <div class="container mt-5">

        <div class="row  d-flex justify-content-center">
            <h1 style="text-align:center">Discussion Forum</h1>
            <form action="/comment/add/{{$program->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Post a new comment</label>
                    <textarea required name="comment" id="" cols="20" rows="8" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post</button>
            </form>
            @if(!$comments->isEmpty())
          
            <div class="col-md-8">

                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5>Comments({{$program->comments_count}})</h5>

                    <div class="buttons">

                        <span class="badge bg-white d-flex flex-row align-items-center">
                            <span class="text-primary">Comments "ON"</span>
                            <div class="form-check form-switch">
                              <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                              
                            </div>
                        </span>
                        
                    </div>
                    
                </div>


                @foreach($comments as $comment)
                <div class="card comment-card p-3">

                    <div class="d-flex justify-content-between align-items-center">

                  <div class="user d-flex flex-row align-items-center">
                    <span style="margin-right:7px;color:white;width:30px;height:30px;background:rgb(50, 50, 50);border-radius:50%;display:flex;align-items:center;justify-content:center">
                        {{substr($comment->user->name, 0, 1)}}
                    </span>
                    <span><small class="font-weight-bold text-primary">{{$comment->user->name}}</small> <small class="font-weight-bold">{{$comment->comment}}</small></span>
                      
                  </div>


                  <small>{{$comment->created_at->diffForHumans()}}</small>

                  </div>


                  <div class="action d-flex justify-content-between mt-2 align-items-center">

                    <div class="reply px-4">
                        @if(auth()->user()->id === $comment->user->id)
                        <form style="display: inline" action="/comment/delete/{{$comment->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="border:none;background:transparent;display:inline" type="submit"><small>Remove Comment</small>
                                <span class="dots"></span></button>
                        </form>
                        @endif
                        
                        <small>Reply</small>
                        
                       
                    </div>

                    <div class="icons align-items-center">

                        
                        
                    </div>
                      
                  </div>
                </div>
                @endforeach


            </div>
            @else
            <div class="col-md-12 mt-4">

                    <h1 style="text-align: center">No Comments Yet</h1>
                
            </div>
            @endif
            
        </div>
        
    </div>
  </section>
@endsection