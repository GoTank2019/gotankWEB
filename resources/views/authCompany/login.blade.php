@include('templates.company.partials._head')
<body class="hold-transition login-page">
<div class="login-box">
  @if (session('message'))
          <div class="box-body">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
              </button>
              <h4>
                <i class="icon fa fa-check"></i>
                Sukses !!!
              </h4>
              {{ session('message') }}
            </div>
          </div>
          @endif

          @if (session('error'))
          <div class="box-body">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                &times;
              </button>
              <h4>
                <i class="icon fa fa-check"></i>
                Gagal !!!
              </h4>
              {{ session('error') }}
            </div>
          </div>
          @endif
  <div class="login-logo">
    <a href=""><b>GO-</b>TANK</a>
  </div>
    
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">MASUK DENGAN EMAIL ANDA</p>

    <form action="{{route('company.login')}}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
        </div>
        <!-- /.col -->
      </div>

      <br>
      <div class="row">
        <div class="col-xs-8">
          {{-- <a href="#">Lupa Password ?</a> --}}
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <a href="{{route('register')}}" class="text-center"><b>Daftar Disini</b></a>
        </div>
        <!-- /.col -->
      </div>

    </form>
    <!-- /.social-auth-links -->

{{--     <div class="col-xs-12">
      <div class="col-xs-6">
        <a href="#">Lupa Password ?</a><br>
      </div>

      <div class="col-xs-6">
        <a href="{{route('register')}}" class="text-center">Daftar Disini</a>
      </div>

    </div> --}}

    
  </div>
  <!-- /.login-box-body -->
</div>
@include('templates.company.partials._script')
</body>
</html>
