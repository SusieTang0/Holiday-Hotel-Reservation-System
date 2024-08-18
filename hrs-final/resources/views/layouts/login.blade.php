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
    <!--<link href="{{ asset('css/mdb.min.css') }}"rel="stylesheet">-->
    <link href="{{ url('styles/css/mdb.min.css') }}"rel="stylesheet">
    <!-- MDB -->
    <link href="{{ url('styles/css/style.css') }}" rel="stylesheet">
    

    <style>
        #intro {
          background-image: url("{{ url('styles/img/475316587.jpg') }}");
          height: 100vh;
        }

        #main-container{
          width:150%;
          display:block;
        }

        #login-container{
          width:50%;
          margin:0 auto;
          color:black;
          padding:2% 5% 2%;
          border-radius:15px;
        }

        #register-container{
          width:80%;
          margin:0 auto;
          color:black;
          padding:2% 5% 2%;
          background-color: #fff;
          border-radius:15px;
        }

        #logo-set{
          display:block;
          text-align:center;

        }

        /* Height for devices larger than 576px */
        @media (min-width: 992px) {
          #intro {
            margin-top: 0px;   
          }

          #register-container{
            width: 70%;   
          }
        }
    </style>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400italic,400,600|Roboto+Mono:300,400">
 
    
    
  </head>
  <body>
    <!-- Start your project here-->
     <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
        
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
        
          <div class="container d-flex align-items-center justify-content-center text-center w-100 h-100">
              @yield('content')

          </div>
        </div>
    </div>
    <!-- Background image -->
    
    <!-- End your project here-->

    <!-- MDB -->
    <script type="text/javascript" src="{{ asset('public/styles/js/mdb.umd.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
  </body>
</html>
