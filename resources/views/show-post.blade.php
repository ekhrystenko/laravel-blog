@extends('layout.layout')

@section('title', $post->title)

@section('header')
    @include('include.header', ['categories' => $categories])
@endsection

@section('content')
<div class="row col-lg-8 offset-2">
    <div class="col">
        <div class="card shadow-sm">
            <img src="{{ '/public/storage/posts/'.$post->image }}" class="card-img-top" alt="{{ $post->title }}">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title" style="display: inline">{{ $post->title }}</h5>
                    <small class="text-muted">Views: {{ $post->view }}</small>
                </div>
                <small>Категория: {{ $post->category->title }}</small>
                <p>{!! $post->description !!}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-flat">
                        @auth()
                            @if(auth()->user()->isAdmin())
                                <a  href="{{ route('posts.edit', $post->id) }}" type="button" class="btn btn-sm btn-outline-warning">Редактировать</a>
                                <a data-bs-toggle="modal" data-bs-target="#delete{{ $post->id }}" type="button" class="btn btn-sm btn-outline-danger">Удалить</a>
                                @include('admin.modal.post-delete')
                            @endif
                        @endauth
                        <a href="{{ route('home') }}" type="button" class="btn btn-sm btn-outline-secondary">Назад</a>
                    </div>
                    <small class="text-muted">{{ $post->created_at }}</small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
