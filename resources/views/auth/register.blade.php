@extends('layout.layout')

@section('content')
<div class="row justify-content-center">
  <div class="col-12 col-sm-8 col-md-6">
    <form class="form mt-3" action="{{ route('register') }}" method="post">
      @csrf
      <h3 class="text-center text-light">Register</h3>
      <div class="form-group">
        <label for="name" class="text-light">Fullname:</label><br>
        <input type="text" name="name" id="name" class="form-control" />
        @error('name')
          <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mt-3">
        <label for="email" class="text-light">Email:</label><br>
        <input type="email" name="email" id="email" class="form-control" />
        @error('email')
          <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mt-3">
        <label for="password" class="text-light">Password:</label><br>
        <input type="password" name="password" id="password" class="form-control" />
        @error('password')
          <span class="fs-6 text-danger mt-2 d-block">{{ $message }}</span>
        @enderror
      </div>
      <div class="form-group mt-3">
        <label for="password_confirmation" class="text-light">Confirm Password:</label><br>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
      </div>
      <div class="form-group">
        <label for="remember-me" class="text-light"></label><br>
        <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit" />
      </div>
      <div class="text-right mt-2">
        <a href="{{ route('login') }}" class="text-light">Already have account? Login here.</a>
      </div>
    </form>
  </div>
</div>
@endsection