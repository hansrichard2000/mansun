<!DOCTYPE html>
<?php
use App\Models\Student;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Auth;
$current_user = Student::all()->where('student_id', Auth::user()->student_id);
if(isset($current_user)){
    $current_user = Lecturer::all()->where('lecturer_id', Auth::user()->lecturer_id);
}
//dd(Auth::user());
?>

<html>
    <head>
        <title>@yield('judul')</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/fonts/fontawesome5-overrides.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/layout.css')}}">

    </head>
    <body id="page-top">
    <div id="wrapper">
        @include('nav.nav_beranda')
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                @include('nav.top_nav')
                @yield('content')
            </div>
            <footer class="bg-white sticky-footer" style="opacity: 1;background: linear-gradient(#1789fc 100%, rgba(255,255,255,0) 100%);color: rgb(255,255,255);">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Mansun 2020</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a></div>
{{--        <script src="{{ asset('js/app.js')}}" ></script>--}}
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/js/chart.min.js')}}"></script>
        <script src="{{asset('assets/js/bs-init.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
        <script src="{{asset('assets/js/theme.js')}}"></script>
    </body>
</html>
