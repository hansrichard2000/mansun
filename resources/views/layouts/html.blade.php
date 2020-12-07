<html>
    <head>
        <title>@yield('judul')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">

        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>
    <body id="page-top">
        @yield('content')
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/chart.min.js')}}"></script>
        <script src="{{asset('assets/js/bs-init.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="{{asset('assets/js/theme.js')}}"></script>
    </body>
</html>
