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

              <h2 class="card-title"><strong>{{$comments->count()}}</strong></h2>
              <h6 class="card-subtitle mb-2 text-muted">Comments</h6>
              
            </div>
          </div>
        </div>
      </div>

    </section>
  </section>

  <section class="card no-border rounded shadow-sm mt-3">
    <section class="card-body">
      <h1 class="mb-3">Comments</h1>
      @foreach($comments as $comment)
                <div class="card comment-card p-3 mt-3">

                    <div class="d-flex justify-content-between align-items-center">

                  <div class="user d-flex flex-row align-items-center">
                    <span style="margin-right:7px;color:white;width:30px;height:30px;background:rgb(50, 50, 50);border-radius:50%;display:flex;align-items:center;justify-content:center">
                        {{substr($comment->user->name, 0, 1)}}
                    </span>
                    <span><small class="font-weight-bold text-primary">{{$comment->user->name}}</small> <small style="font-weight:15px !important" class="font-weight-bold">{{$comment->comment}}</small></span>
                      
                  </div>


                  <small>{{$comment->created_at->diffForHumans()}}</small>

                  </div>


                  <div class="action d-flex justify-content-between mt-2 align-items-center">

                    <div class="reply px-4">
                       
                        <form style="display: inline" action="/comment/delete/{{$comment->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" style="" type="submit"><small>Remove Comment</small>
                                <span class="dots"></span></button>
                        </form>
                        
                        
                        <button class="btn btn-info"><small>Reply</small></button>
                        
                       
                    </div>

                    <div class="icons align-items-center">

                        
                        
                    </div>
                      
                  </div>
                </div>
                @endforeach
    </section>
  </section>
@endsection