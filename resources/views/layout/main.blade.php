<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{--<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>--}}

    <!-- Latest compiled and minified CSS -->
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}

<!-- Optional theme -->
    <link rel="stylesheet" href="https://bootswatch.com/cerulean/bootstrap.min.css">

    <!-- Compiled css -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Latest compiled and minified JavaScript -->
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>--}}

    <!-- Compiled js -->
    <script src="/js/app.js"></script>
    <title>Ads</title>

    <style>
    </style>
</head>
<body>

    @include('layout.nav')

    <div class="container">
    @if($flash = session('message'))
        <div id="flash" class="alert alert-success flash-message">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $flash }}
        </div>
    @endif
    @if($flash = session('error-message'))
        <div id="flash" class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Ops! </strong>{{ $flash }}
        </div>
    @endif
        <div class="row">

            @yield('content')

        </div>
    </div>

    @include('layout.footer')

    @yield('script')

</body>
</html>