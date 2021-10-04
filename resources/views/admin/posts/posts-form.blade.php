@extends('admin.layout.admin-layout')

@section('title', isset($post) ? 'Редактировать пост '. $post->title : 'Добавить пост')

@section('content')

    @if(isset($post))
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="card card-warning col-lg-8 p-0 ml-3">
                            <div class="card-header">
                                <h3 class="card-title">Редактировать пост "{{ $post->title }}"</h3>
                            </div>
                            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text"
                                               class="mb-3 form-control @error('title') is-invalid @enderror"
                                               name="title" id="title" placeholder="Название"
                                               value="{{ $post->title }}">
                                        @error('title')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <label for="preview">Превью</label>
                                        <input type="text"
                                               class="mb-3 form-control @error('preview') is-invalid @enderror"
                                               name="preview" id="preview" placeholder="Превью"
                                               value="{{ $post->preview }}">
                                        @error('preview')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <label for="view">Просмотры</label>
                                        <input type="text" class="mb-3 form-control @error('view') is-invalid @enderror"
                                               name="view" id="view" placeholder="Простотры" value="{{ $post->view }}">
                                        @error('view')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <label for="category">Категория</label>
                                        <select class="mb-3 form-control" name="category" id="category">
                                            @foreach($categories as $category)
                                                <option value="{{ $post->category->id }}"
                                                        @if($post->category_id == $category->id)
                                                        selected
                                                    @endif
                                                >{{ $category->title }}</option>
                                            @endforeach
                                        </select>

                                        <label for="image" class="form-label">Картинка</label>
                                        <input class="mb-3 form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" value="{{ $post->image }}">
                                        @error('image')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <div class="card-body pad p-0">
                                            <div class="mb-3">
                                                <label for="description">Описание</label>
                                                <textarea class="textarea @error('description') is-invalid @enderror"
                                                          placeholder="Описание" name="description"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; padding: 10px;">{{ $post->description }}</textarea>
                                                @error('description')
                                                <p class="mt-1" style="color: red">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-warning mt-3">Сохранить</button>
                                        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Назад</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    @else

        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="card card-success col-lg-8 p-0 ml-3">
                            <div class="card-header">
                                <h3 class="card-title">Добавить пост</h3>
                            </div>
                            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="title">Название</label>
                                        <input type="text"
                                               class="mb-3 form-control @error('title') is-invalid @enderror"
                                               name="title" id="title" placeholder="Название"
                                               value="{{ old('title') }}">
                                        @error('title')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <label for="preview">Превью</label>
                                        <input type="text"
                                               class="mb-3 form-control @error('preview') is-invalid @enderror"
                                               name="preview" id="preview" placeholder="Превью"
                                               value="{{ old('preview') }}">
                                        @error('preview')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <label for="view">Просмотры</label>
                                        <input type="text" class="mb-3 form-control @error('view') is-invalid @enderror"
                                               name="view" id="view" placeholder="0" value="{{ old('view') }}">
                                        @error('view')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <label for="category">Выберите категорию</label>
                                        <select class="form-control @error('category') is-invalid @enderror"
                                                name="category" id="category">
                                            <option value=""></option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <label for="image" class="form-label">Картинка</label>
                                        <input class="mb-3 form-control @error('image') is-invalid @enderror" type="file"
                                               id="image" name="image">
                                        @error('image')
                                        <p class="mt-1" style="color: red">
                                            {{ $message }}
                                        </p>
                                        @enderror

                                        <div class="card-body pad p-0">
                                            <div class="mb-3">
                                                <label for="description">Описание</label>
                                                <textarea class="textarea @error('description') is-invalid @enderror"
                                                          placeholder="Описание" name="description"
                                                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; padding: 10px;">{{ old('description') }}</textarea>
                                                @error('description')
                                                <p class="mt-1" style="color: red">
                                                    {{ $message }}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success mt-3">Создать</button>
                                        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-3">Назад</a>
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

