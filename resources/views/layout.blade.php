<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('css')
    <link rel="stylesheet" href="{{ asset("css/bootstrap.min.css")}}">
    <title>@yield('title')</title>
</head>

<body>
    <ul>
        @guest
        <li><a href="{{ url("register") }}">Register</a></li>
        <li><a href="{{ url("login") }}">Login</a></li>
        @endguest

        @auth
        <form action="{{url('logout')}}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        @endauth
        
    </ul>
    @yield('content')


    @yield('js')
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
</body>
</html>
