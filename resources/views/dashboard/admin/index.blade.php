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

  <section class="card no-border rounded shadow-sm mt-3" x-data="{submit:false, comment: false, toggle() { this.comment = ! this.comment }}">
    <section class="card-body">
      <h1 class="mb-3">Comments</h1>
      @foreach($comments as $comment)
                @if($comment->parent_id == null)
                <div class="card comment-card p-3 mt-3">

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
                        
                        <small @click="toggle()">Reply ({{$comment->replies->count()}})</small>
                        <div x-show="comment" class="mt-2">
                            <form @submit="submit = true;" action="/comment/add/{{$comment->program_id}}" method="POST">
                                @csrf
                                <div class="form-group" style="display:inline !important">
                                    <label for="">Post a reply</label>
                                    <input type="hidden" name="parent_id" value="{{$comment->id}}">
                                    <input style="display:inline" type="text" required name="comment" class="mb-1 form-control" />
                                    <button x-show="!submit" type="submit" class="btn btn-primary">send</button>
                                <button x-show="submit" class="btn btn-info" disabled>Replying to Comment.. <div style="margin-top:-10px" class="loader"></div></button>
                                </div>
                                
                                
                
                            </form>
                        </div>
                        
                       
                    </div>

                    <div class="icons align-items-center">

                        
                        
                    </div>
                      
                  </div>
                </div>

                @foreach ($comment->replies as $reply)
                <div style="width:80%;margin-left:auto" class="card comment-card p-3 mt-3">

                    <div class="d-flex justify-content-between align-items-center">

                  <div class="user d-flex flex-row align-items-center">
                    <span style="margin-right:7px;color:white;width:30px;height:30px;background:rgb(50, 50, 50);border-radius:50%;display:flex;align-items:center;justify-content:center">
                        {{substr($reply->user->name, 0, 1)}}
                    </span>
                    <span><small class="font-weight-bold text-primary">{{$reply->user->name}}</small> <small class="font-weight-bold">{{$reply->comment}}</small></span>
                      
                  </div>


                  <small>{{$reply->created_at->diffForHumans()}}</small>

                  </div>


                  <div class="action d-flex justify-content-between mt-2 align-items-center">

                    <div class="reply px-4">
                        @if(auth()->user()->id === $reply->user->id)
                        <form style="display: inline" action="/comment/delete/{{$reply->id}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button style="border:none;background:transparent;display:inline" type="submit"><small>Remove Reply</small>
                                </button>
                        </form>
                        @endif
                        
                        
                        
                       
                    </div>

                    <div class="icons align-items-center">

                        
                        
                    </div>
                      
                  </div>
                </div>
                @endforeach

                @endif
                @endforeach
    </section>
  </section>
@endsection