<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta name="keywords" content="#">
  <meta name="description" content="#">
  <title>Barcelos | Login</title>
  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="#">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="#">
  <link rel="apple-touch-icon-precomposed" href="#">
  <link rel="shortcut icon" href="#">
  <!-- Bootstrap -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Fontawesome -->
  <link href="/assets/css/font-awesome.css" rel="stylesheet">
  <!-- Flaticons -->
  <link href="/assets/css/font/flaticon.css" rel="stylesheet">
  <!-- Swiper Slider -->
  <link href="/assets/css/swiper.min.css" rel="stylesheet">
  <!-- Range Slider -->
  <link href="/assets/css/ion.rangeSlider.min.css" rel="stylesheet">
  <!-- magnific popup -->
  <link href="/assets/css/magnific-popup.css" rel="stylesheet">
  <!-- Nice Select -->
  <link href="/assets/css/nice-select.css" rel="stylesheet">
  <!-- Custom Stylesheet -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <!-- Custom Responsive -->
  <link href="/assets/css/responsive.css" rel="stylesheet">
  <!-- Color Change -->
    <link rel="stylesheet" class="color-changing" href="/assets/css/color4.css">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&amp;display=swap" rel="stylesheet">
  <!-- place -->
</head>

<body>
  <div class="inner-wrapper">
    <div class="container-fluid no-padding">
      <div class="row no-gutters overflow-auto">
        <div class="col-md-6">
          <div class="main-banner">
            <img src="assets/img/banner/banner-1.jpg" class="img-fluid full-width main-img" alt="banner">
            <div class="overlay-2 main-padding">
              <img src="/backend/assets/images/logo.png" style="width: 40%" class="img-fluid" alt="logo">
            </div>
            <img src="assets/img/banner/burger.png" class="footer-img" alt="footer-img">
          </div>
        </div>
        <div class="col-md-6">
            <div class="section-2 user-page main-padding">
                <div class="login-sec">
                    <div class="login-box">
                        <form method="POST" action="{{ route('login') }}">
                            <h4 class="text-light-black fw-600">Sign in with your Quickmunch account</h4>
                                <div class="row">
                                    <div class="col-12">
                                        <p class="text-light-black">Have a corporate username?
                                            <a href="{{ route("login") }}">Click here</a>
                                        </p>
                                        @csrf
                                        <div class="form-group">
                                            <label for="email" class="text-light-white fs-14">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email" class="form-control form-control-submit @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="password" class="text-light-white fs-14">{{ __('Password') }}</label>
                                            <input id="password" type="password" class="form-control form-control-submit @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                            <div data-name="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                        </div>
                                        <div class="form-group checkbox-reset">
                                            <label class="custom-checkbox mb-0">
                                            <input type="checkbox" name="#"> <span class="checkmark"></span> {{ __('Remember Me') }}</label>
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn-second btn-submit full-width">
                                                Login
                                            </button>
                                        </div>
                                        <div class="form-group text-center mb-0">
                                            <a href="{{ route("register") }}">Create your account</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <!-- Place all Scripts Here -->
  <!-- jQuery -->
  <script src="/assets/js/jquery.min.js"></script>
  <!-- Popper -->
  <script src="/assets/js/popper.min.js"></script>
  <!-- Bootstrap -->
  <script src="/assets/js/bootstrap.min.js"></script>
  <!-- Range Slider -->
  <script src="/assets/js/ion.rangeSlider.min.js"></script>
  <!-- Swiper Slider -->
  <script src="/assets/js/swiper.min.js"></script>
  <!-- Nice Select -->
  <script src="/assets/js/jquery.nice-select.min.js"></script>
  <!-- magnific popup -->
  <script src="/assets/js/jquery.magnific-popup.min.js"></script>
  <!-- Maps -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
  <!-- sticky sidebar -->
  <script src="/assets/js/sticksy.js"></script>
  <!-- Munch Box Js -->
  <script src="/assets/js/quickmunch.js"></script>
  <!-- /Place all Scripts Here -->
</body>
</html>
