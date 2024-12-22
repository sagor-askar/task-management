<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task Management System</title>

    {{-- bootstrap cdn --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    {{-- custom css --}}
    <style>
        .masthead {
            height: 100vh;
            min-height: 500px;
            background-image: url("https://source.unsplash.com/BtbjCFUvBXs/1920x1080");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">TMS</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">

                    @auth
                    <li class="nav-item">
                        <a href="{{ url('/home') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-link nav-link">Logout</button>
                        </form>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="font-weight-light">Task Management System</h1>
                    <p class="lead">A Great Partner of You!</p>
                </div>
            </div>
        </div>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
