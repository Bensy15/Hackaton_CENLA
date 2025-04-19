<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Помощь</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Помощь</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    @auth('user')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.home') }}">Начальная страница</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('post.index') }}"> Все обращения</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Выйти</button>
                            </form>
                        </li>
                    @elseauth('volunteer')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('volunteer.home') }}">Начальная страница</a>
                        </li>
                        <li class="nav-item">
                            <span class="nav-link">Volunteer: {{ Auth::guard('volunteer')->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link">Выйти</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.register') }}">Зарегестрировать пользователя</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('volunteer.register') }}">Зарегестрировать волонтера</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Войти</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>