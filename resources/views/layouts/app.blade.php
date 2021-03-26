<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

</head>
<body class="bg-gray-100">
    <nav class="shadow-md flex justify-between p-2 bg-white">
        <ul class="flex">
            <li class="p-3"><a href="{{route('home')}}">Home</a> </li>
            <li class="p-3"><a href="{{route('dashboard')}}">Dashboard</a> </li>
            <li class="p-3"><a href="{{route('posts')}}">Posts</a> </li>
        </ul>
        <ul class="flex">
            @auth
                <li class="p-3 font-semibold">{{ auth()->user()->username }}</li>
                <li class="p-3">
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 rounded-md text-white font-semibold w-24 h-8">Logout</button>
                    </form>
                </li>
            @endauth
            @guest
                <li class="p-3"><a href="{{ route('login') }}">Login</a> </li>
                <li class="p-3"><a href="{{ route('register') }}">Register</a> </li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>