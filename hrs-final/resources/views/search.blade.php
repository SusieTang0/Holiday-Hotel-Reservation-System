@extends('layouts.main')

@section('content')


<div id="main-container" class="text-black W-80" data-mdb-theme="black" >
  <br><br>
  @if($errors->any())
      @foreach ($errors->all() as $error)
        <div class="alert alert-danger" role="alert">
          {{ $error }}
        </div>
        <script> alert({{ $error }}); </script>
      @endforeach
    @endif
  <div class="container" id="search-container">
		<!-- Search Form -->
		<form class="form" action="{{ route('room.search') }}" method="post">
			@csrf
      <div class="row d-flex align-items-center justify-content-center">
        
        <div class="col-md-3 p-3">
        <label class="form-label" for="start" >Check-in Date:</label>
          <div class="form-outline" data-mdb-input-init>
         
              <input class="form-control" type="date" id="start" min="<?php echo date('Y-m-d'); ?>" name="start" value="{{ $start }}" required>
         
             
          </div>
        </div>
        <div class="col-md-3 p-3">
        <label  class="form-label" for="end">Check-out Date:</label>
          <div class="form-outline" data-mdb-input-init>
           
              <input class="form-control" type="date" id="end" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" name="end"  value="{{ $end }}" required>
         
          
         
            </div>
          </div>
        <div class="col-md-3 p-3">
        <label class="form-label" for="num_persons">Number of Persons:</label>
          <div class="form-outline" data-mdb-input-init>
           
            <input  type="number" id="num_persons"  min="1" name="num_persons" value="{{$num_persons}}" required>
           
          </div>
        </div>

        <div class="col-md-2 mx-2 d-flex align-items-center py-3">
            <button type="submit" class="btn btn-primary py-3 col-md-10" scope="col">Search Now</button>
        </div>
      </div>
		</form>
    <!-- Search Form -->
    <hr class="hr">
    <!-- Weather Form -->
    <div class="container mb-3 p-0" >
      <div class="row" id="weather-feature" style="height:auto;">
          <div class="col-md-4 px-2">@include('weather')</div>    
          <div class="row col-md-8 p-0 px-5 py-5 d-flex align-items-center justify-content-center">
            <div class="h6 col-md-4"><i class="fas fa-utensils"></i> Restaurant</div>
            <div class="h6 col-md-4"><i class="fas fa-eye"></i> City view</div>
            <div class="h6 col-md-4"><i class="fas fa-person-swimming"></i> Indoor swimming pool</div>
            <div class="h6 col-md-4"><i class="fas fa-dumbbell"></i> Fitness center</div>
            <div class="h6 col-md-4"><i class="fas fa-wifi"></i> Free WiFi</div>
            <div class="h6 col-md-4"><i class="far fa-snowflake"></i> Air conditioning</div>
           
          </div>    
      </div>
    </div>
    <hr class="hr">
    <!-- Weather Form -->

  </div>
	<!-- Display Available Rooms -->
  <div class="container px-4" id="search-container">
    @if (request()->method() == 'POST')
      @if (!empty($availableRooms))
          @for($i=0;$i<count($availableRooms);$i++)
            @php
              $room =$availableRooms[$i];
              $url='styles/img/'.$i.'.jpg';
            @endphp
            <div class="card mb-3 card-hover px-4">
                <div class="row g-0">
                  <div class="col-md-3">
                    <img src="<?php echo 'styles/img/room'.$i.'.jpg';?>" class="img-fluid rounded-start w-100 h-90" alt="..." style="">
                  </div>
                  <div class="col-md-7">
                    <div class="card-body">
                      <h4 class="card-title ">{{ $room['type']}}</h4>
                      <p class="card-text h6">Room Size: {{ $room['size']}} m&sup2</p>
                      <p class="card-text d-inline h6">Facilities: </p>
                      @foreach ($room['facilities'] as $facilities)
                      <h5 class="card-text d-inline"><small>{{ $facilities }},</small></h5>
                      @endforeach
                      <p class="card-text"><small class="text-body-secondary">
                        @php
                        if($room[0]!=[]){
                          $count = count($room[0]);
                        }else{
                          $count = 0;
                        }
                          if($count===0){
                            echo "No room available";
                          }else if($count===1){
                            echo "Only ".count($room[0])." room available";
                          }else{
                            echo "Only ".count($room[0])." rooms available";
                          }
                          
                          $availCust= $count * $room['capacity'];
                          if($availCust < $num_persons){
                            echo "<br>"."The remaining rooms can accommodate maximum ". $availCust." guests once";
                          }
                        @endphp
                      </small></p>
                      
                    </div>
                  </div>
                  <div class="col-md-2 d-flex align-items-center justify-content-center">
                  <a class="btn btn-primary p-4" href="{{ route('room.book',['type_number' => $i]) }}" disabled>Book Now</a>
                  </div>
                </div>
            </div>
          @endfor
      @else
        <p>No rooms available!</p>
      @endif
    @endif
  </div>
</div>


@endsection
