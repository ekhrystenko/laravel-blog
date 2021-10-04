@extends('layout.layout')

@section('title', 'Главная')

@section('header')
    @include('include.header', ['categories' => $categories])
@endsection

@section('content')
@if(count($posts))
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-2">
        @foreach($posts as $post)
            <div class="col">
{{--                @mySecondDirectives($post)--}}
                <div class="card shadow-sm" style="max-height: 755px">
                    <img src="{{ '/public/storage/posts/'.$post->image }}" class="card-img-top" alt="{{ $post->title }}" style="max-height: 270px">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title" style="display: inline">{{ $post->title }}</h5>
                            <small class="text-muted">Views: {{ $post->view }}</small>
                        </div>
                        <small>Категория: {{ $post->category->title }}</small>
                        <p class="mt-1">{{ mb_substr($post->preview, 0, 20) . '...' }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a  href="{{ route('show.post', [$post->category->id, $post->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Посмотреть</a>
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
