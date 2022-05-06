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
            font-family: 'Nunito', sans-serif;
        }

        .comment-card {
    
    border: none;
    box-shadow: 5px 6px 6px 2px #e9ecef;
    border-radius: 4px;
}


.dots{

    height: 4px;
  width: 4px;
  margin-bottom: 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}

.badge{

        padding: 7px;
        padding-right: 9px;
    padding-left: 16px;
    box-shadow: 5px 6px 6px 2px #e9ecef;
}

.user-img{

    margin-top: 4px;
}

.check-icon{

    font-size: 17px;
    color: #c3bfbf;
    top: 1px;
    position: relative;
    margin-left: 3px;
}

.form-check-input{
    margin-top: 6px;
    margin-left: -24px !important;
    cursor: pointer;
}


.form-check-input:focus{
    box-shadow: none;
}


.icons i{

    margin-left: 8px;
}
.reply{

    margin-left: 12px;
}

.reply small{

    color: #b7b4b4;

}

        .no-border{
            border: none;
        }

        .loader {
        display: inline-block;
        position:relative;
        top:5px;
        border: 4px solid #f3f3f3;
        border-radius: 50%;
        border-top: 4px solid grey;
        width: 20px;
        height: 20px;
        -webkit-animation: spin 1s linear infinite; /* Safari */
        animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
        0% { -webkit-transform: rotate(0deg); }
        100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
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
    <x-dashboard-nav></x-dashboard-nav>
    <section class="row" style="width:100%">
        <div class="col col-sm-12 col-md-2 col-lg-2" style="background:#F8F9FA;min-height:80vh;position:sticky">
            <!---Sidebar-->
            <ul class="side-menu">
                <li class="mb-1"><a class="side-item {{ request()->is('dashboard') ? 'side-active' : '' }}" href="{{route('dashboard')}}">Dashboard</a></li>
                <li class="mb-1"><a class="side-item {{ request()->is('dashboard/my-grades') ? 'side-active' : '' }}" href="{{route('mygrades')}}">My Grades</a></li>
                <li class="mb-1"><a class="side-item" href="{{route('dashboard')}}">Settings</a></li>
                <li class="mb-1"><form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="side-item" :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                  </a>
                </form></li>
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