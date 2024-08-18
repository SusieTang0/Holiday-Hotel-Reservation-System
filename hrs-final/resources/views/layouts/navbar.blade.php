
    <!-- Start project here-->
    <nav class="navbar navbar-expand-lg" id="myNavbar">
      <!-- Container wrapper -->
      <div class="container-fluid" id="nav-container">
        <div class="mask" style="background-color: rgba(0, 0, 0, 0.8);">
          <div class="container d-flex align-items-center justify-content-center text-center w-100 h-100">
              <!-- Collapsible wrapper -->
              <div  class="navbar-collapse mt-2" id="navbarLeftAlignExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <i class="fas fa-square-h fa-3x"></i>
                  </li>
                  <li class="nav-item">
                  @if(Auth::check()) 
                    <a class="nav-link active" aria-current="page" href="{{ url('/search') }}"><h3 class="text-white"><em>Holiday Hotel</em></h3></a>
                
                  @else
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}"><h3  class="text-white"><em>Holiday Hotel</em></h3></a>
                  @endif
                  </li>
                </ul>
                <!-- Left links -->
                
                <div class="d-flex align-items-center">

                @if(Auth::check()) 
                <p>Welcome, {{ Auth::user()->firstname}}<p>
                  <a class="btn btn-outline-light" href="{{ url('/logout') }}">Logout</a>
                  @else
                  <a class="btn btn-outline-light" href="{{ route('logout')}}">Login</a>
         <a class="btn btn-outline-light" href="{{ url('/register') }}">Sign Up</a>
                
                @endif
               
                </div>
                
              </div>
              <!-- Collapsible wrapper -->
          </div>
          
        </div>
      <!-- Container wrapper -->
      </div>
    </nav>
    
    <!-- End project here-->

