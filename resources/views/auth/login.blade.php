<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Smarthr - Bootstrap Admin Template">
    <meta name="keywords"
          content="admin, estimates, bootstrap, business, corporate, creative, management, minimal, modern, accounts, invoice, html5, responsive, CRM, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <title>Leaves - HRMS admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/line-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/material.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/select2.min.css')}}">

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap-datetimepicker.min.css')}}">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;500;600;700;800;900&amp;display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

</head>

<body class="account-page">

<div class="main-wrapper">
    <div class="account-content">
        <div class="container">
            <div class="account-box">
                <div class="account-wrapper">
                    <h3 class="account-title">Đăng nhập</h3>
                    <p class="account-subtitle">Truy cập vào bảng điều khiển của chúng tôi</p>
                    @if (session('message'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="input-block mb-3">
                            <label class="col-form-label">Địa chỉ email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="input-block mb-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <label class="col-form-label">Mật khẩu</label>
                                </div>
                                {{-- <div class="col-auto">
                                    <a class="text-muted" href="{{ route('password.request') }}">
                                        Forgot password?
                                    </a>
                                </div> --}}
                            </div>
                            <div class="position-relative">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="fa fa-eye-slash" id="toggle-password"></span>
                            </div>

                            <div class="position-relative">
                                <div class="form-check mt-3">
                                    <input class="form-check-input " type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="input-block mb-3 text-center">
                            <button class="btn btn-primary account-btn" type="submit">Đăng nhập</button>
                        </div>
                        {{-- <div class="account-footer">
                            <p>Don't have an account yet? <a href="register.html">Register</a></p>
                        </div> --}}
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>


<script src="{{asset('assets/js/jquery-3.7.0.min.js')}}"></script>

<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>

<script src="{{asset('assets/js/select2.min.js')}}"></script>

<script src="{{asset('assets/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{asset('assets/js/moment.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>

<script src="{{asset('assets/js/app.js')}}"></script>

<script>
    $(document).ready(function(){
        $('.form-logout').on('click', function(e){
            e.preventDefault();
            e.target.closest('form').submit();
        })

    })
</script>
<script>
    const isLoggedIn = {{ Auth::check() ? 'true' : 'false' }};
    if(isLoggedIn == false){
        localStorage.removeItem('nav-link')
    }
</script>
</body>

</html>
