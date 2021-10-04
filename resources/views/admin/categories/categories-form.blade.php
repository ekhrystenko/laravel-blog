@extends('admin.layout.admin-layout')

@section('title', isset($category) ? 'Редактировать категорию '. $category->title : 'Добавить категорию')

@section('content')

    @if(isset($category))
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="card card-warning col-lg-8 p-0 ml-3">
                        <div class="card-header">
                            <h3 class="card-title">Редактировать категорию "{{ $category->title }}"</h3>
                        </div>
                        <form action="{{ route('categories.update', $category) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Название" value="{{ $category->title }}">
                                        @error('title')
                                            <p class="mt-1" style="color: red">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    <button type="submit" class="btn btn-warning mt-3">Сохранить</button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @else

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="card card-success col-lg-8 p-0 ml-3">
                        <div class="card-header">
                            <h3 class="card-title">Добавить категорию</h3>
                        </div>
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Название" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="mt-1" style="color: red">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    <button type="submit" class="btn btn-success mt-3">Создать</button>
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-3">Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>
    </div>
    @endif
@endsection


