@extends('admin.layout.admin-layout')

@section('title', 'Пользователи')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div>
                    @include('admin.include.messages')
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Пользователи</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped table-hover projects" id="categories">
                        <thead>
                        <tr>
                            <th style="width: 1%">Аватар</th>
                            <th style="width: 20%">Имя</th>
                            <th style="width: 30%">Email</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)

                            <div class="modal fade" id="photo{{ $user->id }}" tabindex="-1" aria-labelledby="photo" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-body">
                                        <img src="{{ ($user->provider != null) ? $user->avatar : "/public/storage/avatar/" . $user->avatar }}" alt="photo" style="width: 500px; height: 500px">
                                    </div>
                                </div>
                            </div>

                            <tr>
                                <td>
                                    <a data-bs-toggle="modal" data-bs-target="#photo{{ $user->id }}" style="cursor: pointer">
                                        <img src="{{ ($user->provider != null) ? $user->avatar : "/public/storage/avatar/" . $user->avatar }}" alt="photo" style="width: 160px; height: 170px; border-radius: 50%">
                                    </a>
                                </td>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td class="project_progress">
                                    {{ $user->email }}
                                </td>
                                <td class="project-actions">
                                    <a href="{{ route('users.edit', $user) }}" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"> Редактировать</i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#delete{{ $user->id }}" type="button" class="btn btn-danger">
                                        <i class="fas fa-trash"> Удалить</i>
                                    </a>
                                    @include('admin.modal.user-delete', $user)
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
@endsection

