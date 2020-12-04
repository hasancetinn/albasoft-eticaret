<!DOCTYPE html>
<html lang="{{config('app.locale')}}">

<head>
    <meta charset="UTF-8">
    <title>@yield('title',config('app.name'))</title>
    <link rel="stylesheet" type="text/css" href="{{ url('../css/app.css') }}" />
    @include('fronts.partials.head')
    @yield('head')
</head>

<body id="commerce">
@include('fronts.partials.navbar')
@yield('content')
@include('fronts.partials.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{url('/js/app.js')}}"></script>

@yield('footer')

</body>

</html>