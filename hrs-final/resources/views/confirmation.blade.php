
@extends('layouts.main')

@section('content')

  <div id="main-container" class="w-80" data-mdb-theme="black">
    <div class="container d-flex  justify-content-center" id="search-container">
      <div class="container col-lg-12"> 
          <form class="form pt-5" action="# " method="post">
              <div class="alert alert-success col-lg-12 justify-content-center " role="alert">
                      <h3>Your booking has been successfully submitted!</h3><br>
                      <h5>Thank you for choosing us.</h5>
              </div>
              <br><hr>
              <h4 class="pt-3">Booking Confirmation</h4>
              <hr class="hr">
              <div class="row mb-4">
                  <div class="col">
                    <h4 class="form-label" for="firstname">Check-in Date: {{$start}} </h4>
                  </div>
                  <div class="col">
                   <h4 class="form-label" for="firstname">Check-out Date: {{$end}}</h4>
                  </div>
                  <div class="col">
                    <h4 class="form-label" for="firstname">Number of Persons: {{$num_persons}}</h4>
                  </div>
              </div>
           </form> 
      </div>
    </div>
  </div> 


@endsection
