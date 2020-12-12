@extends('layouts.login')

@section('judul')
    Welcome at ManSUn
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-12 col-xl-10">
            <div class="card shadow-lg o-hidden border-0 my-5">
                <div class="card-body p-0">
                    <div class="row" style="height: 515px">
                        <div class="col-lg-6 d-none d-lg-flex">
                            <div class="flex-grow-1 bg-login-image" style="background: url(&quot;assets/img/Frame%206.jpg&quot;) center / contain;width: 800px;"></div>
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h4 class="text-dark mb-4">Welcome Back!</h4>
                                </div>
                                <form class="user" action="{{route('login')}}" method="POST">
                                    <div class="form-group">
{{--                                            <input id="exampleInputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
                                            <input class="form-control form-control-user @error('email') is-invalid @enderror" type="email" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="email" required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                        </span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control form-control-user" type="password" id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <div class="form-check">
                                                <input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1">
                                                <label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label>
                                            </div>
                                        </div>
                                    </div><button class="btn btn-primary btn-block text-white btn-user" type="submit" style="background: #1789fc;">Login</button>
                                    <hr>
                                </form>
                                <div class="text-center"></div>
                                <div class="text-center"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
