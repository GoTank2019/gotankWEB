@include('templates.admin.partials._head')
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Go-</b>Tank Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <!-- <p class="login-box-msg">Sign in to start your session</p> -->
    <form action="{{route('get.admin.login')}}" method="post">
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
    </form>
    <!-- /.social-auth-links -->
<!--
    <a href="#">I forgot my password</a><br> -->
  </div>
  <!-- /.login-box-body -->
</div>
@include('templates.admin.partials._script')
</body>
</html>
