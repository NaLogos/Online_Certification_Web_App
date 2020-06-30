


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>TheSaaS — Login</title>

    <!-- Styles -->
    <link href="{{asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="../assets/img/apple-touch-icon.png">
    <link rel="icon" href="../assets/img/favicon.png">
  </head>

  <body class="layout-centered bg-img" style="background-image: url({{asset('img/1.jpg')}});">


    <!-- Main Content -->
    <main class="main-content">

      <div class="bg-white rounded shadow-7 w-400 mw-100 p-6">
        <h5 class="mb-7">Sign into your account</h5>
        
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif


        <form method="POST" action="{{ route('login') }}">
            @csrf
          <div class="form-group">
            <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
            @if($errors->has('email'))
                <div class="invalid-feedback">
                    {{ $errors->first('email') }}
                </div>
            @endif
          </div>

          <div class="form-group">
            <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
            @if($errors->has('password'))
                <div class="invalid-feedback">
                    {{ $errors->first('password') }}
                </div>
            @endif
          </div>

          <div class="form-group flexbox py-3">
            <div class="custom-control custom-checkbox">
            
              <input class="custom-control-input" name="remember" type="checkbox" id="remember" />
              <label class="custom-control-label" for="remember" style="vertical-align: middle;">
                {{ trans('global.remember_me') }}
              </label>

            </div>

            
            <a class="text-muted small-2" href="{{ route('password.request') }}">Forgot password?</a>
          </div>

          <div class="form-group">
            <button class="btn btn-block btn-primary" type="submit">Login</button>
          </div>
        </form>



        <hr class="w-30">

        <p class="text-center text-muted small-2">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
      </div>

    </main><!-- /.main-content -->


    <!-- Scripts -->
    <script src="../assets/js/page.min.js"></script>
    <script src="../assets/js/script.js"></script>

  </body>
</html>

