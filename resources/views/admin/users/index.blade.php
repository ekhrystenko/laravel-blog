@extends('admin.layout.admin-layout')

@section('title', 'Пользователи')

@section('content')

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                    <div>
                        @include('admin.include.messages')
                    </div>
{{--                <div class="row mb-2 col-lg-3">--}}
{{--                    <a href="{{ route('posts.create') }}" class="btn btn-success ml-1"><i class="fas fa-plus mr-2"></i> Добавить пост</a>--}}
{{--                </div>--}}
            </div>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Пользователи</h3>
                        </div>
                        <div class="card-body">
                            <table id="posts" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Название</th>
                                    <th>Превью</th>
                                    <th>Категория</th>
                                    <th>Просмотры</th>
                                    <th>Дата создания</th>
                                    <th>Дата обновления</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->id }}</td>
                                    <td><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></td>
                                    <td>{{ $post->preview }}</td>
                                    <td>{{ $post->category->title }}</td>
                                    <td>{{ $post->view }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>{{ $post->updated_at }}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('datatables')
    <script>
        $(document).ready( function () {
            $('#posts').DataTable();
        });
    </script>
@endsection
