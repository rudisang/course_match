@include('scripts.points')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        
        body{
            background-color: #f5f5f5;
            font-family: 'Nunito', sans-serif;
        }

 
    </style>
    <title>Dashboard</title>
</head>
<body>
    <img style="margin-left:40px;margin-top:10px" width=40 src="{{public_path('images/logo.png')}}" alt="ub logo" />
    <section class="row mt-3" style="width:100%;margin-top:10px">
        
        <div class="col col-sm-12 ">
            <div style="width:95%;margin-inline:auto">
                
                <section>
                    @if($points < $program->min_points)
                    <div style="background:rgba(235, 107, 107, 0.84);padding:50px 30px;border-radius:15px" role="alert">
                        <h3 style="color:rgb(36, 36, 36)">! You Don't Have The Required POINTS To Apply For This Program.</h3>
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
                                <div style="border-radius:15px;background:rgb(216, 220, 93);padding:20px 30px" role="alert">
                                    <p style="font-weight:bold">Your GCSE Points {{$points}} Meet The Requirements ({{$program->min_points}}points) To Enroll For This Program, However:</p>
                                    <p style="font-weight:bold">Below are the minimum requirements for this program:</p>
                                    <ul>
                                        @foreach ($program->requirements as $requirement)
                                            <li>GCSE <strong>{{$requirement->subject}}</strong> With Grade <strong>{{calcGrade($requirement->min_points)}}</strong> - <strong>{{$requirement->min_points}}</strong> Points or Better</li>
                                        @endforeach
                                    </ul>
                                    <p>You May Not Have Done or Met The Required Pass Mark For The Subjects Required For This Program</p>
                                </div>
                            @else
                                <div style="background:rgb(93, 220, 93);padding:50px 30px;border-radius:15px" role="alert">
                                    <h1>You Qualify For This Program</h1>
                                </div>
                            @endif
                            
                        @else
                        <div style="background:rgb(93, 220, 93);padding:50px 30px;border-radius:15px" role="alert">
                            <h1>You Qualify For This Program</h1>
                        </div>
                        @endif
                    
                    @endif
                
                    
                  <section style="margin-top:20px;background:white;border-radius:15px;padding:30px">
                    <section >
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
