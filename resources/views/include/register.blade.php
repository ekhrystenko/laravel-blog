@extends('layout.layout')
@section('title', 'Регистрация')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="wrapper_register col-lg-6 col-sm-12 mt-5 mb-5">

            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h5 class="text-center">Регистрация</h5>

                <div class="mb-3 mt-3">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Имя" value="{{ old('name') }}">
                    @error('name')
                    <p class="t-1 error_messages">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                    @error('email')
                    <p class="t-1 error_messages">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group-file mb-3">
                    <label for="avatar">Добавить фотографию</label>
                    <input type="file" name="avatar" id="avatar" class="form-control mt-1" value="">
                </div>

                <div class="mb-3 password">
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль">
                    <span id="show-pass" title="Показать пароль"><i class="far fa-eye"></i></span>
                    @error('password')
                    <p class="t-1 error_messages">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3 password">
                    <input type="password" name="password_confirmation" id="password-confirm" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Повторите пароль">
                    <span id="show-pass-confirm" title="Показать пароль"><i class="far fa-eye"></i></span>
                    @error('password_confirmation')
                    <p class="t-1 error_messages">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-secondary w-100">Зарегестрироваться</button>
                <a href="{{ route('login') }}" class="btn btn-secondary w-100 mt-2 mb-3">Назад</a>
{{--                <div class="links text-center mb-2">--}}
{{--                    <p>Регистрация с помощью:</p>--}}
{{--                    <a href="#"><img src="{{ asset('/img/facebook.png') }}" alt="facebook"></a>--}}
{{--                    <a href="#"><img src="{{ asset('/img/google.png') }}" alt="google"></a>--}}
{{--                </div>--}}
            </form>
        </div>
    </div>
</div>
@endsection
