<?php

namespace App\Http\Controllers;

use App;
use App\Models\Booking;
use App\Models\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class BookingController extends Controller
{
  /**
   * Display selected room details .
   */
  public function showRoom($type_number)
  {
    //Get search input from session

    $start = session("start");
    $end = session("end");
    $num_persons = session("num_persons");
    $num_days = session("num_days");

    
    //Gets rooms from rooms.json file
    $jsonContent = File::get(storage_path("json/rooms.json"));
    $roomsData = json_decode($jsonContent, true);
    $roomTypes = $roomsData['room_types'];
    $room = [];
  
    $bookedRooms = $this->getBookedRooms($start, $end);
    $availableRooms = $this->getAvailableRooms($roomsData, $bookedRooms, $num_persons);
    
   
    for ($i = 0; $i < count($availableRooms); $i++) {
      if ($i == $type_number) {
        $rooms = $availableRooms[$i];
        $roomNums=[];
        $roomCounter = ceil($num_persons / $rooms['capacity']);
        
        for($j=0;$j < count($rooms[0]); $j++){         
          if($j<$roomCounter){
            $roomNums[]=$rooms[0][$j];
          }
        }
        
        $room= [
          'room_numbers' => $roomNums,
          'type' => $rooms['type'],
          'capacity' => $rooms['capacity'],
          'size' => $rooms['size'],
          'facilities' => $rooms['facilities'],
          'rate' => $rooms['rate']
        ];
        break;
      }
    }

   
    $num_rooms = count($room['room_numbers']);
   
    session(["num_rooms" => $num_rooms]);
    $price = $num_days * $room['rate'] * $num_rooms;
    session(["price" => $price]);
    session(["rooms" => $room]);
    
    return view("booking", ["rooms" => $room, "start" => $start, "end" => $end, "num_persons" => $num_persons, "num_days" => $num_days, "price" => $price,"num_rooms" => $num_rooms]);
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

  public function bookRoom(Request $request,$room_number)
  {
    $cusInfo = $request->validate([
      "firstname" => "required|string",
      "lastname" => "required|string",
      "email" => "required|email",
      "address" => "required|string",
      "phoneNo" => "required|string"
    ]);
  
    //Retreive form data
    $firstname = $request->input("firstname");
    $lastname = $request->input("lastname");
    $email = $request->input("email");
    $address = $request->input("address");
    $phoneNo = $request->input("phoneNo");


    $existingCustomer = Customer::
        where("phoneNo", "=", $phoneNo)
      ->where("firstname", "=", $firstname)
      ->where("lastname", "=", $lastname)
      ->where("email", "=", $email)
      ->where("address", "=", $address)
      ->first();

      if (!$existingCustomer) {
        $customer = Customer::create($cusInfo);
      }

      $start = session("start");
      $end = session("end");
      $num_persons = session("num_persons");
      $num_days = session("num_days");
      $num_rooms = session("num_rooms");
      $price = session("price");
      $rooms = session("rooms");
     
   
    

    $customer = Customer::where('email', $request->input('email'))->first();
  
    if (!$customer) {
      return redirect()->back()->with('error', 'Customer not found.');
    }

    foreach($rooms['room_numbers'] as $roomNumber){
      $bookingData = [
        'customerID' => $customer->customerID,
        'roomNo' => $roomNumber,
        'checkIn' => $start,
        'checkOut' => $end,
        'numberOfDays' => $num_days,
        'numberOfGuests' => $rooms['capacity'],
        'price'=> $price,

      ];

      $existingBooking = Booking::
        where("roomNo","=", $roomNumber)
        ->where("checkIn","=", $start)
        ->where("checkOut","=", $end)
        ->where("numberOfDays","=", $num_days)
        ->where("numberOfGuests","=", $num_persons)
        ->where("customerID","=", $customer->customerID)
        ->first();

        if (!$existingBooking) {
          $booking = Booking::create($bookingData);
        }

       
    }
    

   
   
    return view("confirmation", ["room" => $rooms, "start" => $start, "end" => $end, "num_persons" => $num_persons]);
  }

 




}
