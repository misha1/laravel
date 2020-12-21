<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title-block')</title>
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    @include('inc.header')

    @if(Request::is('/'))
        @include('inc.hero')
    @endif
    <div class="container mt-5">
        @include('inc.message')
        <div class="row">
            @if(Request::is('/'))
                <div class="col-8">
                    @yield('content')
                </div>
                <div class="col-4">
                    @include('inc.aside')
                </div>
            @else
                <div class="col-12">
                    @yield('content')
                </div>
            @endif
        </div>
    </div>
    @if(!(Request::is('plastinky')))
        @include('inc.footer')
    @endif

</body>
</html>
