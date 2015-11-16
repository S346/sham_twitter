<!DOCTYPE HTML>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('/css/app.css')}}"/>
    <script src="{{asset('js/app.js')}}"></script>
    <title>ツイッターもどき @yield('title')</title>
</head>
<body>

@include('navbar')

<div class="container">
    @if (Session::has('flash_message'))
        <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
    @endif

    @yield('content')
</div>

</body>
</html>