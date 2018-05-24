<!DOCTYPE html>
<html>
  @include('pangkat.layoutLTE.head')

  <body class="login-page">
    <div class="login-box">

      <div class="login-logo" style="color:#ffffff;">
        <img class="wow fadeInDown" data-wow-delay="300ms"  src="{{asset('storage/files/situbondo.gif')}}">
        <br><h1 class="wow fadeInLeft" data-wow-delay="600ms">BKPSDM SITUBONDO</h1>
          <hr><h2 class="wow fadeInRight" data-wow-delay="900ms">Aplikasi Usulan Pangkat</h2>
      </div><!-- /.login-logo -->
      <div class="login-box-body wow fadeInUp" data-wow-delay="1200ms">
        <p class="login-box-msg">Silahkan login sesuai user dan password yang telah dimiliki</p>
        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

          <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
            <input id="username" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus  placeholder="Username">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
          </div>

          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
            <input id="password" type="password" class="form-control" name="password" required placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="row">
            <div><!-- /.col -->
              <br>
            <div class="col-xs-4">
              <input type="hidden" name="_token" value="{{ csrf_token() }}" />
              <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
          </div>
        </form>


        <br>

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    @include('pangkat.layoutLTE.script')
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
