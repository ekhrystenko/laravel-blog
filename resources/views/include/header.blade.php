<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item logo">
                    <a class="nav-link @menuActive('/')" href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
                </li>
                @foreach($categories as $category)
                    <li class="nav-item @menuActive('category/'. $category->id)">
                        <a class="nav-link" aria-current="page" href="{{ route('category', $category->id) }}">{{ $category->title }}</a>
                    </li>
                @endforeach
                @auth()
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item">
                            <a class="nav-link admin" href="{{ route('admin.home') }}">Панель администратора</a>
                        </li>
                    @endif
                @endauth
            </ul>
            <ul class="navbar-nav ms-auto">
                <form class="d-flex">
                    <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" value="{{ request()->search}}">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            @guest()
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">
                        Вход
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">
                        Регистрация
                    </a>
                </li>
            @endguest
            @auth()
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                        <li>
                            <a class="nav-link" href="{{ route('logout') }}">Выход</a>
                        </li>
                    </ul>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
