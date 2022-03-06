@extends('layout.layout')

@section('title', $category->title)

@section('header')
    @include('include.header', ['categories' => $categories])
@endsection

@section('content')
    @if(count($posts))
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    @foreach($posts as $post)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ '/public/storage/posts/'.$post->image }}" class="card-img-top" alt="{{ $post->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <small>Категория: {{ $post->category->title }}</small>
                    <p>{{ $post->preview }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('show.post', [$post->category->id, $post->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Посмотреть</a>
                        </div>
                        <small class="text-muted">{{ $post->created_at }}</small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
{{ $posts->links() }}
    @else
        <p class="text-center">По вашему запросу ничего не найдено...</p>
    @endif
@endsection
