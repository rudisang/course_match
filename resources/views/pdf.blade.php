@include('scripts.points')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{public_path('css/style.css')}}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body{
            background-color: #f5f5f5;
            font-family: 'Nunito', sans-serif;
        }

        .no-border{
            border: none;
        }

        .rounded{
            border-radius: 10px !important;
        }

        .side-menu{
            top:20px;
            padding: 20px 0;
            position:relative;
            min-width:100%;
            font-size:1.1rem;
            color:#212529;
            text-align:left;
            list-style:none;
            background-clip:padding-box;
        }

        .side-item{
            padding:0.5rem 1rem;
            display:block;
            color:inherit;
            text-decoration:none;
            border-bottom:1px solid transparent;
        }

        .btn-filter{
            border:1px solid rgb(255, 217, 0); 
            transition: ease-in-out .5s;
        }

        .btn-filter:hover{
            background-color: rgb(255, 217, 0);
            color:rgb(255, 255, 255);
            font-weight:bold;
            transition: ease-in-out .5s;
        }

        .side-item:hover{
            background-color: #e9e9e9;
            color: #212529;
            border-radius:5px;
            cursor:pointer;
        }

        .side-active{
            background-color: #e9e9e9;
            color: #56a4f1;
            border-radius:5px;
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
    
    <section class="row mt-3" style="width:100%">
        
        <div class="col col-sm-12 ">
            <div class="container">
                
                <section>
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
                </section>
                
            </div>
        </div>
    </section>
   
    <script src="{{public_path('js/main.js')}}"></script>
</body>
</html>
