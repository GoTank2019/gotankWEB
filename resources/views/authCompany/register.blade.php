@include('templates.company.partials._head')
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href=""><b>GO-</b>TANK</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">BERGABUNG DENGAN KAMI SEKARANG!</p>

    <form action="{{ route('company.register') }} " method="POST">
        @csrf

      <div class="form-group has-feedback">
        <input id="name" placeholder="Nama Lengkap" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input id="email" placeholder="Masukan Email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input id="password" placeholder="Masukan password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input id="password-confirm" placeholder="Konfirmasi Password" type="password" class="form-control" name="password_confirmation" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input id="password" placeholder="No Telephone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" required>

        @if ($errors->has('phone'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <textarea name="address" placeholder="Alamat" rows="8" cols="80" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}">{{old('address')}}</textarea>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12" style="">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <a href="" class="text-center">Sudah Punya Akun? <b>Login Disini</b></a>
  </div>
  <!-- /.form-box -->
</div>
@include('templates.company.partials._script')
</body>