@include('templates.company.partials._head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>GO-</b>TANK</a>
  </div>
    
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">MASUK DENGAN EMAIL ANDA</p>

    <form action="{{route('company.login')}}" method="post">
      @csrf
      <div class="form-group has-feedback">
        <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
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
          <a href="#">Lupa Password ?</a>
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
