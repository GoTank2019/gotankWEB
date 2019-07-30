<!-- Nav -->
<nav id="nav" class="navbar nav-transparent">
  <div class="container">

    <div class="navbar-header">
      <!-- Logo -->
      <div class="navbar-brand">
        <a href="">
          <img class="logo" src="{{asset('frontend/img/logo.png')}}" alt="logo">
          <img class="logo-alt" src="{{asset('frontend/img/logo-alt.png')}}" alt="logo">
        </a>
      </div>
      <!-- /Logo -->

      <!-- Collapse nav button -->
      <div class="nav-collapse">
        <span></span>
      </div>
      <!-- /Collapse nav button -->
    </div>

    <!--  Main navigation  -->
    <ul class="main-nav nav navbar-nav navbar-right">
      <li><a href="#home">Home</a></li>
      <li><a href="#gabung">Join Us</a></li>
      <li><a href="#about">About</a></li>
      <li><a href="#service">Service</a></li>
      <!-- <li><a href="#team">Team</a></li> -->
      <li><a href="#contact">Contact</a></li>
      @auth('company')
      <li><a href="{{route('dashboard')}}">My Account</a></li>
      @else
      {{-- <li><a href="{{route('login')}}">Login</a></li>
      <li><a href="{{route('register')}}">Register</a></li> --}}
      @endauth
    </ul>
    <!-- /Main navigation -->
  </div>
</nav>
    <!-- /Nav -->

    <!-- home wrapper -->
<div class="home-wrapper">
  <div class="container">
    <div class="row">

      <!-- home content -->
      <div class="col-md-10 col-md-offset-1">
        <div class="home-content">
          <h1 class="white-text">We Are Sedot WC Agency</h1>
          {{-- <h4 class="white-text">Daftarkan disini Sekarang !!!</h4> --}}
          <p class="white-text">Anda tidak perlu bersusah payah lagi untuk mencari jasa Sedot WC, Kami datang untuk memudahkan pengguna jasa dan penyedia jasa, sekarang anda bisa menjadi bagian dari kami.
          </p>

          <br>
          <br>
          <br>
          <p class="white-text">Pengguna Jasa bisa Download Aplikasi di bawah</p>
          <button href="#" type="button" class="btn btn-primary btn-lg">Download App GoTank</button>
                        {{-- <a type="submit" class="white-btn" value="Submit" href="{{url('')}}">Login</a> --}}
                        {{-- <a type="button" class="white-btn" value="Register" href="#">Register</a> --}}
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->
