{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body> --}}
@extends('templates.main')

@section('container')
  <h1 class="m-3">Login</h1>
    <form enctype="multipart/form-data" method="POST" action = "{{ route('login') }}">
        @csrf
        <div class="m-3">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name = "email" value = "{{ old('email') }}">
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="m-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name = "password" value = "{{ old('password') }}">
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary m-3">Login</button>
        <p class="ms-3">Don't have an account? <a href="{{ route('registerPage') }}">Register Here!</a></p>
      </form>
@endsection
{{-- </body>
</html> --}}