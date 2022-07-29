<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <style>
    html, body {
      height: 100%;
    }
  </style>

  <title>Login</title>
</head>
<body class="d-flex justify-content-center align-items-center" style="background: #d21d21;">

  <div style="width: 30%;" class="card px-3 py-4 rounded-lg ">
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="text-center mb-4">
      <span class="h2 text-uppercase">Masuk Admin</span>
    </div>
    <form action="/admin" method="post">
      @csrf
      <div class="form-group">
        <label for="email" class="px-1">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="email@gmail.com">
        @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="password" class="px-1">Password</label>
        <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="password" placeholder="Password">
        @error('password')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="tampilPassword()">
        <label class="form-check-label" for="exampleCheck1">Tampilkan kata sandi</label>
      </div>
      <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary btn-block">Masuk</button>
      </div>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <script>
    function tampilPassword()
    {
      var pass = document.getElementById("password");
      if(pass.type === "password") {
        pass.type = 'text'
      } else {
        pass.type = 'password'
      }
    }
  </script>
</body>
</html>