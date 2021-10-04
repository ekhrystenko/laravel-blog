@extends('admin.layout.admin-layout')

@section('title', 'Категории')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div>
                    @include('admin.include.messages')
                </div>
                <div class="row mb-2 col-lg-3">
                    <a href="{{ route('categories.create') }}" class="btn btn-success ml-1"><i
                            class="fas fa-plus mr-2"></i> Добавить категорию</a>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Категории</h3>
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
                            <th style="width: 1%">#</th>
                            <th style="width: 20%">Название</th>
                            <th style="width: 30%">Дата создания</th>
                            <th>Дата редактирования</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a>
                                        {{ $category->title }}
                                    </a>
                                </td>
                                <td>
                                    {{ $category->created_at }}
                                </td>
                                <td class="project_progress">
                                    {{ $category->updated_at }}
                                </td>
                                <td class="project-actions">
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"> Редактировать</i>
                                    </a>
                                    <a data-bs-toggle="modal" data-bs-target="#delete{{$category->id}}" type="button" class="btn btn-danger">
                                        <i class="fas fa-trash"> Удалить</i>
                                    </a>
                                    @include('admin.modal.category-delete', $category)
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

