<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

  <title>Register</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: -ms-flexbox;
      display: -webkit-box;
      display: flex;
      -ms-flex-align: center;
      -ms-flex-pack: center;
      -webkit-box-align: center;
      align-items: center;
      -webkit-box-pack: center;
      justify-content: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f5f5f5;
    }

    .form-signin {
      width: 100%;
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
    }

    .form-signin .checkbox {
      font-weight: 400;
    }

    .form-signin .form-control {
      position: relative;
      box-sizing: border-box;
      height: auto;
      padding: 10px;
      font-size: 16px;
    }

    .form-signin .form-control:focus {
      z-index: 2;
    }

    .form-signin input[type="email"] {
      margin-bottom: -1px;
      border-bottom-right-radius: 0;
      border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
      margin-bottom: 10px;
      border-top-left-radius: 0;
      border-top-right-radius: 0;
    }
  </style>
</head>

<body class="text-center">
  <form class="form-signin" action="{{ route('auth-register-process') }}" method="post" enctype="multipart/form-data" id="login_form">
    {{ csrf_field() }}
    <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1>
    <label for="name" class="sr-only">Name</label>
    <input type="text" id="name" class="form-control" placeholder="Name" required autofocus name="name">
    <label for="email" class="sr-only">Email</label>
    <input type="email" id="email" class="form-control" placeholder="Email address" required autofocus name="email">
    @error('email')
    <br>
    <span class="text-danger font-weight-bold">{{ $message }}</span>
    @enderror
    <label for="password" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control" placeholder="Password" required name="password">
    <div class="checkbox mb-3">
      <a href="{{ route('auth-login') }}">Login</a>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
  </form>
</body>

</html>