@extends('admin.layout.admin-layout')

@section('title', 'Профиль')

@section('content')

    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Редактировать {{ $admin->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('profile.update', $admin->id) }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Имя</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Имя" value="{{ $admin->name }}">
                            @error('name')
                            <p class="t-1 error_messages">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $admin->email }}">
                            @error('email')
                            <p class="t-1 error_messages">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Аватар</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="avatar" name="avatar" value="{{ $admin->avatar }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Пароль</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Пароль" value="{{ $admin->password }}">
                            @error('password')
                            <p class="t-1 error_messages">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" placeholder="Повторите пароль" value="{{ $admin->password }}">
                            @error('password_confirmation')
                            <p class="t-1 error_messages">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-warning">Сохранить</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Назад</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="photo" tabindex="-1" aria-labelledby="photo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-body">
                <img src="{{ "/public/storage/avatar/" . $admin->avatar }}" alt="photo" style="width: 500px; height: 500px">
            </div>
        </div>
    </div>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                    <div>
                        @include('admin.include.messages')
                    </div>
                <div class="card-body box-profile">
                    <div class="text-center">
                        <a data-bs-toggle="modal" data-bs-target="#photo"><img class="profile-user-img img-fluid img-circle" src="{{ "/public/storage/avatar/" . $admin->avatar }}" alt="User profile picture" style="height: 140px; width: 140px"></a>
                    </div>

                    <h3 class="profile-username text-center">{{ $admin->name }}</h3>

                    <p class="text-muted text-center">Администратор сайта</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{ $admin->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Роль</b> <a class="float-right">@if(auth()->user()->isAdmin()) Администратор сайта @endif</a>
                        </li>
                        <li class="list-group-item">
                            <b>Пароль</b> <a class="float-right">{{ $admin->password }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Дата создания</b> <a class="float-right">{{ $admin->created_at }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Дата обновления</b> <a class="float-right">{{ $admin->updated_at }}</a>
                        </li>
                    </ul>

                    <a data-bs-toggle="modal" data-bs-target="#edit" class="btn btn-warning">Редактировать</a>
                    <a href="#" class="btn btn-secondary">Назад</a>
                </div>
            </div>
        </section>
@endsection
