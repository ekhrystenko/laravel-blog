@extends('admin.layout.admin-layout')

@section('title', $post->title)

@section('content')

    @include('admin.modal.post-delete', $post)

    <!-- Modal -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="col-sm-6 mb-2">
                    <h1>Пост: {{ $post->title }}</h1>
                </div>
                <div class="row col-lg-7">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ '/public/storage/posts/'.$post->image }}" class="card-img-top" alt="{{ $post->title }}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="card-title" style="display: inline">{{ $post->title }}</h5>
                                    <small class="text-muted">Views: {{ $post->view }}</small>
                                </div>
                                <small>Категория: {{ $post->category->title }}</small>
                                <p>{!! $post->description !!} </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-flat">
                                        <a href="{{ route('posts.edit', $post->id) }}" type="button" class="btn btn-sm btn-outline-warning mr-1">Редактировать</a>
                                        <a data-bs-toggle="modal" data-bs-target="#delete{{ $post->id }}" type="button" class="btn btn-sm btn-outline-danger mr-1">Удалить</a>
                                        <a href="{{ route('posts.index') }}" type="button" class="btn btn-sm btn-outline-secondary">Назад</a>
                                    </div>
                                    <small class="text-muted">{{ $post->created_at }}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
