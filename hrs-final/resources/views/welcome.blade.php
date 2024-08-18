@extends('layouts.login')

@section('content')
      
 <!-- Background image -->
 <div id="main-container" class="text-white" data-mdb-theme="light">
    <!-- logo -->
    <div class="pt-5 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center" style="height: 50px;margin-bottom:;">
        <i class="fas fa-square-h fa-2x d-flex align-items-center"></i>
      </div>
      <div class="d-flex align-items-center" style="height: 50px;">
        <h2 style="margin-bottom:0;">&nbsp;<em>Holiday Hotel</em></h2>
      </div>
    </div><br><br>
    <!-- logo -->
    

    <!-- Welcome Phrase -->
    <div>
      <h1 class="mb-3 bg-default">Welcome to Holiday Hotel&<sup>v1</sup></h1>
      <h5 class="mb-3">Best Services for your Best Journey</h5>
    </div>
    <hr class="hr text-white"><br><br>          
    <!-- Welcome Phrase -->

    <!-- login form -->
    <form id="login-container" class="bg-light" action="{{route('login.submit')}}" method="POST">
    @csrf
    @if($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
        <script> alert({{ $error }}); </script>
      @endforeach
    @endif
      <div data-mdb-input-init class="form-outline my-4">
        <input type="email" id="email" name="email" class="form-control border-black"
          placeholder="Email address" />
        <label class="form-label" for="email">Email</label>
      </div>

      <div data-mdb-input-init class="form-outline mb-4">
        <input type="password" id="password" name="password" class="form-control" />
        <label class="form-label" for="password">Password</label>
      </div>

      <div class="text-center pt-1 mb-3 pb-1">
        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>
        <a class="text-muted" href="#">Forgot password?</a>
      </div>
    </form>
    <!-- login form -->

    <!-- Link to Registeration Page -->
    <div class="d-flex align-items-center justify-content-center pb-3 mt-4 "data-mdb-theme="dark">
    <p class="mb-0 me-2">Don't have an account?</p>
    </div>
    <div class="d-flex align-items-center justify-content-center pb-4 m-1 "data-mdb-theme="dark">
        <a class="btn btn-outline-default mx-3 px-5 py-2" href="{{ url('/register') }}">Create new</a>
        <p class="mb-0 ">Or</p>
        <a class="btn btn-outline-default mx-3 px-5 py-2" href="{{ url('/search') }}">Enter as a guest</a>
    </div>
    <!-- Link to Registeration Page -->
        
</div>   

       
<!-- Background image -->
@endsection