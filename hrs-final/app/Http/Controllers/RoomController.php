<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;


class RoomController extends Controller
{
  /**
   * Load weather infomation on the search page
   */
  public function index()
  {
    $today = date("m/d/Y");
    $forecastData = showWeather($today);
    $start = date("Y-m-d");
    $end = date('Y-m-d', strtotime('+1 day'));
    $num_persons = 2;
    session(["start" => $start]);
    session(["end" => $end]);
    session(["num_persons" => $num_persons]);
    return view('search', ["forecastData" => $forecastData, 'start' => $start,'end' => $end,'num_persons'=>$num_persons]);
  }
  /**
   * Search rooms.json and database hrs for available rooms based on user input 
   */
  public function search(Request $request)
  {

    //Validates user input
    $validator = Validator::make($request->all(), [
      "start" => "required|date",
      "end" => "required|date|after:start",
      "num_persons" => "required|int|min:1",
    ]);

    if ($validator->fails()) {
      return redirect()->back()->withErrors($validator)->withInput();
    } else {

      //Stores input in session
      session(["start" => $request->input("start")]);
      session(["end" => $request->input("end")]);
      session(["num_persons" => $request->input("num_persons")]);

      //Get search input from session
      $start = session("start");
      $end = session("end");
      $num_persons = session("num_persons");
      

      //Calculate Number of Days
      $startDate= new \DateTime($start);
      $endDate= new \DateTime($end);
      $num_days = $startDate->diff($endDate)->days;

    

      session(["num_days"=> $num_days]);

      $forecastData = showWeather($start);

      //Gets rooms from rooms.json file
      $jsonContent = File::get(storage_path("json/rooms.json"));
      $roomsData = json_decode($jsonContent, true);

      $bookedRooms = $this->getBookedRooms($start, $end);

      $availableRooms = $this->getAvailableRooms($roomsData, $bookedRooms, $num_persons);

      return view('search', ["availableRooms" => $availableRooms, "forecastData" => $forecastData, 'start' => $start,'end' => $end,'num_persons'=>$num_persons]);
    }
  }
  /**
   * Retrieves booked rooms from the hrs database
   */
  private function getBookedRooms($start, $end)
  {

    $bookedRooms = Booking::whereBetween("checkIn", [$start, $end])
      ->orWhereBetween("checkOut", [$start, $end])
      ->pluck("roomNo")
      ->toArray();
    return $bookedRooms;
  }
  /**
   * Checks booked rooms against rooms.json file and returns the available rooms data
   */
  private function getAvailableRooms($roomsData, $bookedRooms, $num_persons)
  {
    $availableRooms = [];

    foreach ($roomsData['room_types'] as $roomType) {
      $roomNo = [];
      $rooms = [
        'type' => $roomType['type'],
        'size' => $roomType['room_details']['size'],
        'rate' => $roomType['room_details']['rate'],
        'capacity' => $roomType['room_details']['capacity'],
        'facilities' => $roomType['room_details']['facilities']
      ];

      foreach ($roomType['room_no'] as $roomNumber) {
        if (!in_array($roomNumber, $bookedRooms)) {
            $roomNo[] = $roomNumber;
        }
        
      }

      $rooms[] = $roomNo;
      $availableRooms[] = $rooms;
    }

    return $availableRooms;
  }
  /**
   * Display selected room details .
   */
}





function showWeather($startDate){

  // API endpoint and parameters 
  $apiKey = 'c9adcb73dd1bd4837e7a13886563e462';
  $city = 'Montreal';
  $units = 'metric'; // or 'imperial' for Fahrenheit

  // Access to 30-day forecast data
  $response = Http::get("http://api.openweathermap.org/data/2.5/forecast?q=$city&units=$units&cnt=30&appid=$apiKey");

  $weatherData = $response->json();

  $forecastDatas = [];
 
  for ($i = 0; $i < count($weatherData['list']); $i++) {
    $item = $weatherData['list'][$i];

    $futureDate = strtotime("+ $i days");
    if($i === 0){
      $date=date('m/d/Y', $futureDate);
    }else{
      $date=date('m/d', $futureDate);
    }
    $dayOfWeek = date("D", $futureDate);
    $weatherDescription = $item['weather'][0]['description'];
    $weatherIcon = $item['weather'][0]['icon'];
    $tempMin =  round($item['main']['temp_min']); 
    $tempMax = round($item['main']['temp_max']);    
    $temperature = round($item['main']['temp']); 
    $forecastDatas[] = [
        'date' => $date,
        'dayOfWeek' => $dayOfWeek,
        'weatherDescription' => $weatherDescription,
        'temperature' => $temperature,
        'weatherIcon' => $weatherIcon,
        'tempMin' => $tempMin,
        'tempMax' => $tempMax,
    ];
    
  }
  
  $forecastData = [];

  $count = count($forecastDatas);
  for ($i = 0; $i <$count-7; $i++){
    $newDate=$forecastDatas[$i]['date'];
    $timestamp1 = strtotime($startDate); 
    $timestamp2 = strtotime($newDate); 
    $theDate = date('m/d', $timestamp1);
    $firstday = date('m/d', $timestamp2);
    if($firstday===$theDate){
      $forecastData= array_slice($forecastDatas, $i, 7);
      break;
    }
  }
  
 
  if($forecastData!=[]){
    if( $count<=7 && $count>1){
      $forecastData = array_slice($forecastDatas, $count-7, 7);
    }else if($count<=1){
      $forecastData=array_slice($forecastDatas,0,7);
    }
  }else{
      $forecastData = array_slice($forecastDatas, $count-7, 7);
  }

  // Pass weather data to the view
  return $forecastData;
}