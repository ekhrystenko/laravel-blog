@extends('admin.layout.admin-layout')

@section('title', 'Редактировать пользователя '. $user->name)

@section('content')
    @include('admin.modal.added-success')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="card card-warning col-lg-8 p-0 ml-3">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать пользователя {{ $user->name }}</h3>
                        </div>
                        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                @csrf
                                @method('PATCH')
                                <div class="mb-3">
                                    <label for="name" class="col-form-label">Имя</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Имя" value="{{ $user->name }}">
                                    @error('name')
                                    <p class="t-1 error_messages">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="col-form-label">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email" value="{{ $user->email }}">
                                    @error('email')
                                    <p class="t-1 error_messages">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="avatar" class="form-label">Аватар</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="avatar" name="avatar" value="{{ $user->avatar }}">
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" name="is_admin">
                                        @if ($user->is_admin == 1)
                                            <option value="1" selected>Админ</option>
                                            <option value="0">Пользователь</option>
                                        @else
                                            <option value="0" selected>Пользователь</option>
                                            <option value="1">Админ</option>
                                        @endif
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-warning">Сохранить</button>
                                <a type="button" href="{{ route('users.index') }}" class="btn btn-secondary">Назад</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


