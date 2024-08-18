@extends('layouts.login')

@section('content')


<div id="main-container" class="text-white W-80" data-mdb-theme="white" >
  <div id="logo-set"><i class="fas fa-square-h fa-3x"></i><h5><em>Holiday Hotel</em></p></h5></div>
  <br>
  
  <div class="container" id="register-container">
  
    @if($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
      @endforeach
    @endif
    <br>
      
    <form class="text-center" action="{{ url('/') }}" method="POST">
     
      
      <h3 class="pb-3 text-primary">Registration</h3>
      <hr class="border border-primary border-2 opacity-70 mb-3">
      <!-- 2 column grid layout with text inputs for the first and last names -->
      <div   class="px-2">
      <div class="form-row mb-2">
        <input type="text" id="firstname" class="form-control" name="firstname" placeholder="First Name" reqired/>
      </div>
      <div class="form-row mb-2">
          <input type="text" id="lastname" class="form-control" name="lastname" placeholder="Last Name" reqired/>
      </div>

      <!-- Email input -->
      <div class="form-row mb-2">
        <input type="email" id="email" class="form-control" name="email" placeholder="Email" reqired/>
      </div>

      <!-- Phone Number input -->
      <div class="form-row mb-2">
        <input type="phone" id="phone" class="form-control" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Phone Number" aria-describedby="defaultRegisterFormPhoneHelpBlock" reqired/>
      </div>

      <!-- Password Number input -->
      <div class="form-row mb-2">
        <input type="password" id="password" class="form-control" name="password" minlength="6" placeholder="Password" reqired/>
      </div>
      <div class="form-row mb-2">
        <input type="password" id="confirm_password" class="form-control" name="confirm_password" minlength="6" placeholder="Confirm Password" reqired/>
      </div>
      </div>
      <hr class="border border-primary border-2 opacity-70 mb-3">
      <!-- Checked checkbox -->
      <div class="form-check d-flex flex-row mb-4">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked required/>
        <label class="form-check-label" for="flexCheckChecked">I agree to receive emails from the hotel with booking information, hotel offers, etc.</label>
      </div>
    
      <div class="row mb-4 d-flex align-items-center justify-content-center">
        <button type="submit" class="btn btn-primary m-2 col-lg-3" >Sign-Up</button>
        <button type="reset" class="btn btn-primary m-2 col-lg-3" >Reset</button>
        <a type="button" class="btn btn-primary m-2 col-lg-3" href="{{ url('/')}}">Cancel</a>
      </div>
      
    </form>
  </div>

</div>

@endsection