@extends('layouts.main')

@section('content')
 
  <div id="main-container" class="text-black w-80" data-mdb-theme="black">
    <div class="container d-flex  justify-content-center" id="search-container">
        <div class="container col-lg-4 booking-form" id="first-form">
          <form class="form pt-5" >
            {{ csrf_field() }}
            @if ($rooms!="Undefined")
                <h5 class="pb-1">Selected Room Details</h5>
                <hr class="hr">
                <div class="col-md-12 my-2">
                  <label class="h6 col-md-5">Type: </label>
                  <input id="type" class="col-md-6" name="type" type="text" value="{{ $rooms['type'] }}" disabled>
                </div>
                <div  class="col-md-12 my-2">
                  <label class="h6 col-md-5">Size: </label>
                  <input id="size" class="col-md-6 w-60" name="size" type="text" value="{{ $rooms['size'] }} m&sup2" disabled>
                </div>
                
                <div  class="col-md-12 my-2">
                    <label class="h6 col-md-5">Capacity: </label>
                    <input id="capacity" class="col-md-6 w-60" name="capacity" type="text" value="{{ $rooms['capacity'] }}" disabled>
                </div>
                
                <div class="col-md-12 my-2 d-flex align-items-center justify-content-left">
                  <label class="h6 col-md-5 align-items-center">Facilities: </label>
                  <textarea class="col-md-6 w-60 text-start" name="facilities" type="text" style="text-align: left;"rows="9" disabled>
                  {{implode("\r", $rooms['facilities'])}};
                  </textarea>
                  
                </div>

                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="check_in_date ">Check-In Date:</label>
                    <input class="col-md-6 w-60" type="date" id="check_in_date" name="check_in_date" value="{{$start}}" disabled>
                </div>

                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="check_out_date">Check-Out Date:</label>
                    <input class="col-md-6 w-60" type="date" id="check_out_date" name="check_out_date" value="{{$end}}" disabled>
                </div>
                <hr class="hr">
                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="rate">Num of Guests: </label>
                    <input class="col-md-6 w-60" type="text" id="rate" name="rate" value="{{ $num_persons }}" disabled>
                </div>
                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="rate">Num of Rooms: </label>
                    <input class="col-md-6 w-60" type="text" id="rate" name="rate" value="{{ $num_rooms }}" disabled>
                </div>
                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="rate">Availabled Clients: </label>
                    <input class="col-md-6 w-60" type="text" id="rate" name="rate" value="{{ ($num_rooms* $rooms['capacity']) }}" disabled>
                </div>
                @php
                  $roomNum = ceil($num_persons/$rooms['capacity']);
                  if($roomNum>$num_rooms){
                    $gapNum = $roomNum-$num_rooms;
                    echo "You need book ".$gapNum;
                    echo $gapNum == 1 ? " more room" : " more rooms";
                    echo " in other types.";
                  }
                @endphp
                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="rate">Rate: </label>
                    <input class="col-md-6 w-60" type="text" id="rate" name="rate" value="${{ number_format($rooms['rate'], 2) }}" disabled>
                </div>
                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="rate">Days to stay:</label>
                    <input class="col-md-6 w-60" type="number" id="rate" name="rate" value="{{$num_days}}" disabled>
                </div>

                <div class="col-md-12 my-2 d-flex align-items-center ">
                    <label class="h6 col-md-5" for="rate">Total Amount: </label>
                    <input class="col-md-6 w-60" type="text" id="rate" name="rate" value="${{number_format($price,2)}}" disabled>
                </div>

                
            @else
              <p>No rooms available!</p>
            @endif
           
          </form>  
        </div>
                 
        <!-- 2 column grid layout with text inputs for the first and last names -->
        <div class="container col-lg-7 booking-form" id="seconde-form">
        <form class="form pt-5" action="{{ route('book.submit', ['room_numbers' => $num_rooms]) }}" method="post">
        {{ csrf_field() }}    
            <h4 class="pb-1">Customer Information</h4>
            <hr class="hr">
            <!-- 2 column grid layout with text inputs for the first and last names -->
            @if(Auth::check())
              <!-- Name input -->
              <div class="row mb-4">
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ Auth::user()->firstname}}" required/>
                    <label class="form-label" for="firstname"></label>
                  </div>
                </div>
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ Auth::user()->lastname}}" required/>
                    <label class="form-label" for="lastname"></label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email}}" required/>
                <label class="form-label" for="email"></label>
              </div>

              <!-- Adress input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="address" name="address" class="form-control"  value="{{ Auth::user()->address}}" required/>
                <label class="form-label" for="address">Address</label>
              </div>

              <!-- Phone Number input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="string" id="phoneNo" name="phoneNo" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" value="{{ Auth::user()->phoneNo}}" required/>
                <label class="form-label" for="form6Example6"></label>
              </div>
            @else
            <!-- Name input -->
              <div class="row mb-4">
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="firstname" name="firstname" class="form-control" required/>
                    <label class="form-label" for="firstname">First name</label>
                  </div>
                </div>
                <div class="col">
                  <div data-mdb-input-init class="form-outline">
                    <input type="text" id="lastname" name="lastname"  class="form-control" required/>
                    <label class="form-label" for="lastname">Last name</label>
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="email" id="email" name="email" class="form-control" required/>
                <label class="form-label" for="email">Email</label>
              </div>

              <!-- Address input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="text" id="address" name="address" class="form-control" required/>
                <label class="form-label" for="address">Address</label>
              </div>

              <!-- Phone Number input -->
              <div data-mdb-input-init class="form-outline mb-4">
                <input type="string" id="phoneNo" name="phoneNo" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890"  required/>
                <label class="form-label" for="form6Example6">Phone</label>
              </div>


              <!-- Checkbox -->
              <div class="form-check d-flex justify-content-center mb-4">
                <input
                  class="form-check-input me-2"
                  type="checkbox"
                  value=""
                  id="account"
                  checked
                />
                <label class="form-check-label" for="form6Example8"> Create an account? </label>
              </div>
            @endif

            <!-- Submit button -->
            <div data-mdb-input-init class="form-outline mb-4">
            <button type="submit" class="btn btn-primary btn-block mb-4">Place order</button>
            </div>
        <div class="row mb-4">
            <div class="col">
              <div data-mdb-input-init class="form-outline">
        
                
                <button type="reset" class="btn btn-info btn-block mb-4">Reset</button>
              </div>
            </div>
            <div class="col">
              <div data-mdb-input-init class="form-outline">
                <a class="btn btn-default btn-block mb-4" href="#">Cancel</a>
              </div>
            </div>
        </div> 
        </form> 
        </div>
    </div>    
  </div> 
@endsection
