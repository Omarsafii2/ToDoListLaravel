<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light ms-3">
            @if (Route::has('login'))
                @auth
                        <a href="{{ url('/tasks/index') }}" class="navbar-brand">logo</a>
                        <a href="/tasks/category" class="navbar-brand">Tasks</a>
                        <a href="/tasks/create" class="navbar-brand">Add Task</a>
                       

                        <form action="/logout" method="POST" >
                           @csrf 
                            <button type="submit" class="btn btn-danger">Logout</button>
                        </form>
                        
                        
                    @else
                
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                        <li class="nav-item active">
                        <a href="{{ route('login') }}" class="nav-link">Log in</a>
                        </li>

                    <li class="nav-item">
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link">Register</a>
                        @endif
                @endauth
                    </li>
            @endif                        
                </ul>
            </div>    
        </nav>
    
  {{$slot}}
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>