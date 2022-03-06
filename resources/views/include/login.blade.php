@extends('layout.layout')

@section('title', 'Логин')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="wrapper_login col-lg-6 col-sm-12 mt-5 mb-5">

            <form action="{{ route('login') }}" method="POST" id="login-form">
                @csrf
                <h5 class="text-center">Вход</h5>
                <div class="mb-3 mt-3">
                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                        <p class="t-1 error_messages">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3 password">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль">
                    <span id="show-pass" title="Показать пароль"><i class="far fa-eye"></i></span>
                    @error('password')
                        <p class="t-1 error_messages">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    <label for="remember" class="form-check-label">Запомнить меня</label>
                </div>
                <div class="text-center mb-2">
                <button type="submit" class="btn btn-secondary w-100 mb-2">Войти</button>
                <a href="{{ route('home') }}" class="btn btn-secondary w-100 mb-2">Назад</a>
                </div>
            </form>
            <div class="links text-center mb-2">
                <p>Войти с помощью:</p>
                <a href="{{ url('/login/github') }}"><img src="{{ asset('img/github.jpg') }}" alt="github"></a>
            </div>
            <div class="footer text-center">
                Нет аккаутна? <a href="{{ route('register') }}" class="sign-up">Регистрация</a>
            </div>
        </div>
    </div>
</div>
@endsection

