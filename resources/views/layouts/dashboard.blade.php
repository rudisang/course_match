<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <style>
        body{
            background-color: #f5f5f5;
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

        .side-item:hover{
            background-color: #e9e9e9;
            color: #212529;
            border-radius:5px;
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
    <x-dashboard-nav></x-dashboard-nav>
    <section class="row" style="width:100%">
        <div class="col col-sm-12 col-md-2 col-lg-2" style="background:#F8F9FA;min-height:80vh;position:sticky">
            <!---Sidebar-->
            <ul class="side-menu">
                <li class="mb-1"><a class="side-item {{ request()->is('dashboard') ? 'side-active' : '' }}" href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="mb-1"><a class="side-item {{ request()->is('dashboard/my-grades') ? 'side-active' : '' }}" href="{{route('mygrades')}}">My Grades</a></li>
                <li class="mb-1"><a class="side-item" href="{{route('dashboard')}}">Settings</a></li>
                <li class="mb-1"><a class="side-item" href="{{route('dashboard')}}">Logout</a></li>
            </ul>
            
        </div>
        <div class="col col-sm-12 col-md-10 col-lg-10">
            <div class="container">
                <nav class="rounded mt-2 navbar navbar-expand-lg navbar-light bg-light" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <div class="container">
                        @yield('breadcrumb')
                    </div>
                </nav>

                <x-flash-messages></x-flash-messages>

                <section>
                    @yield('content')
                </section>
                
            </div>
        </div>
    </section>
   
    <script src="{{asset('js/main.js')}}"></script>
</body>
</html>