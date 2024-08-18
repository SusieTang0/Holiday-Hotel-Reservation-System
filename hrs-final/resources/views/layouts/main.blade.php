<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" >
    <meta http-equiv="x-ua-compatible" content="ie=edge" >
    <title>Holiday Hotel</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    >

    <!-- Material Design Bootstrap-->
    <link href="{{ asset('styles/css/mdb.min.css') }}"rel="stylesheet">
    <!-- MDB -->
    <link href="{{ asset('styles/css/style.css') }}" rel="stylesheet">
  
    <style>
      #myNavbar{
        height: 150px;
      }

      #nav-container{
        width:100%;
        height: 150px;
        color:white;
        padding: 0 30px;
        background-image: url("{{ url('styles/img/475316587.jpg') }}");
        background-size:cover;
      }

      #search-container{
        padding:0;
        height:auto;

        small {
        color: inherit;
        font-size: 70%;
        }
      }

      #date-picker{
        width:70%;
      }

      

      
    </style>

    <!-- For Date picker -->
    
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js" ></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js" ></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js" ></script>

    <script src="https://cdn.amcharts.com/lib/5/fonts/notosans-sc.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
        
  </head>
  <body>
    <!-- Start your project here-->
    
    @include('layouts.navbar')
    
    @yield('content')
    @include('layouts.footer')
    
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('styles/js/mdb.umd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>
