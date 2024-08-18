
  <!-- Start your project here-->
  @if($errors->any())
      @foreach ($errors->all() as $error)
        <script> alert({{$error}}); </script>
      @endforeach
  @endif
  <!-- Footer -->
  <footer class="text-center text-lg-start bg-body-tertiary text-muted pt-5">
    
    <!-- Section: Links  -->
    <div class="">
      <hr>
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-5 col-lg-6 col-xl-5 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Holiday Hotel
            </h6>
            <p>
            Holiday Inn Express is a five-star hotel ranked in the top three in the 2023 Hospitality Industry Rankings. Here you can experience world-class amenities, exquisite dining options and impeccable service for all your needs. Welcome to a world of unrivaled excellence and luxury.
            </p>
          </div>
          <!-- Grid column -->


          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Services
            </h6>
            <p>
              <a href="#!" class="text-reset">Airport Transfers Booking</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Telephone Booking</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Luggage Storaging</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Monthreal, QC H9E 1N6, CA</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              holidayhotel@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
          
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </div>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Holiday Hotel</a>
    </div>
    <!-- Copyright -->
      
  </footer>
  <!-- Footer -->
  <!-- End your project here-->
