<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Помощь</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="{{ asset('styles/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('styles/header.css') }}" rel="stylesheet">
</head>
<body>
    <header>
        <div class="upblock">
            <div class="logo_div">
                <img src="{{ asset('assets/logo.png') }}">
                <a class="logop" href="{{ route('home') }}" >Помощь рядом  |  На главную</a>
            </div>
                {{-- <ul class="navbar-nav ms-auto"> --}}
                    @auth('user')
                        <div class="helpbtn">
                            <a class="nav-link" href="{{ route('post.index') }}"> Все обращения</a>
                        </div>
                        <div class="helpbtn">
                            <a class="nav-link" href="{{ route('post.create') }}"> Сделать обращения</a>
                        </div>
                        <div class="helpbtn">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Выйти</button>
                            </form>
                        </div>
                    @elseauth('volunteer')
                        <div class="helpbtn">
                            <a class="nav-link" href="{{ route('volunteer.home') }}">Начальная страница</a>
                        </div>
                        <div class="helpbtn">
                            <a class="nav-link" href="{{ route('post.index') }}"> Все обращения</a>
                        </div>
                        <div class="helpbtn">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Выйти</button>
                            </form>
                        </div>
                    @else
                        {{-- <div class="helpbtn">
                            <a class="nav-link" href="{{ route('user.register') }}">Зарегестрировать пользователя</a>
                        </div> --}}
                    <div>
                        <div class="helpbtn">
                            <a class="nav-link" href="{{ route('volunteer.register') }}">Хочу помочь</a>
                        </div>
                        <div class="helpbtn">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </div>
                    </div>
                    @endauth
                {{-- </ul> --}}
            </div>
        </div>
    </header>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

