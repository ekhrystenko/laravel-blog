<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
    <a href="#" class="btn-top"><img src="{{ asset('img/up.png') }}" alt="Top"></a>
    @yield('header')
<div class="container mt-5 mb-3">
    @yield('content')
</div>

<script src="https://kit.fontawesome.com/827ea944e3.js" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- jQuery -->
<script src="{{ asset('/js/jquery-3.6.0.js') }}"></script>
<!-- Main JS -->
<script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
{{--<script>--}}
{{--    $(document).ready(function () {--}}

{{--        $('button[type=submit]').click(function (e){--}}
{{--            e.preventDefault()--}}

{{--            let result = $('#login-form').serializeArray();--}}

{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}

{{--            $.ajax({--}}
{{--                url: '/login',--}}
{{--                type: 'POST',--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name=csrf-token]').attr('content')--}}
{{--                },--}}
{{--                data: result,--}}
{{--                dataType: 'json',--}}
{{--                success: function (data) {--}}
{{--                    console.log(data)--}}
{{--                }--}}
{{--            })--}}
{{--        })--}}
{{--    })--}}
{{--</script>--}}
</body>
</html>
