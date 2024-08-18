<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    .main {
        height:100%;
        margin-top: 50px;
        margin-bottom: 50px;
    }
    .weather-panel {
      background-image: url("{{ url('styles/img/475316587.jpg') }}");
      background-size: cover;
      border-radius: 10px;
      box-shadow: 2px 2px 5px 0px rgba(0,0,0,0.33);
      color: #fff;
    
      

      small {
        color: inherit;
        font-size: 70%;
      }
      ul.forecast > li {
        border-top: 1px solid #fff;
      }
      .temperature {
        & > span {
            font-size: 2em;
        }
      }
    }

    .weather-mask {
      border-radius: 10px;
      background-color: rgba(0, 0, 0, 0.8);
    }
  </style>
  
</head>
<body>
  <!-- Start project here-->

  <div class="row">
    <div class="col-xs-12 p-0  ">
      <div class="row col-lg-10 col-lg-offset-6 weather-panel ms-5">
        <div class="pt-2 px-3 col-lg-12 weather-mask">
            @if (isset($forecastData) && is_array($forecastData)) 
              @for ($i = 0; $i < count($forecastData); $i++)
                @php
                  // set the date and weather for future day
                  $forecast = $forecastData[$i];
                @endphp
                
                @if($i==0)
                <div class="row pt-2 px-2">
                  <div class="col-lg-5">
                      <h6>Montreal<br><small>{{ $forecast['dayOfWeek'] }}&nbsp;{{ $forecast['date'] }}<br><em>{{ $forecast['weatherDescription'] }}</em></small>
                      </h6>
           
                  </div>
                  <div class="col-lg-3">
                  <img src="http://openweathermap.org/img/wn/{{ $forecast['weatherIcon'] }}.png" alt="Weather Icon">
                  </div>
                  <div class="col-lg-4 text-end">
                    <div class="h6 temperature">
                      <span>{{ $forecast['temperature'] }}°</span>
                      <br>
                      <h4><small>{{ $forecast['tempMin'] }}° / {{ $forecast['tempMax'] }}°</small></h4>
                    </div>
                  </div>
                </div>
                  
                <div class="col-lg-12 pb-2">
                  <ul class="list-inline row forecast" style="margin:0;">
                @else
                  <li class="col-xs-3 col-sm-2 text-center pt-1" style="padding:0;">
                    <p class="p-0" style="margin:0;">{{ $forecast['dayOfWeek'] }}<br>
                    {{ $forecast['date'] }}</small></p>
                    <img src="http://openweathermap.org/img/wn/{{ $forecast['weatherIcon'] }}.png" alt="Weather Icon">
                    <p style="margin:0;">{{ $forecast['temperature'] }}°C</p>
                  </li>
                @endif
              @endfor
            @else 
              @php
                echo "none of this exist";
              @endphp
            @endif
          </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

   <!-- End project here-->
  
</body>
</html>




