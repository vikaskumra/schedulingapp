@include('common/header')
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Scheduling</b> APP</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to your Panel</p>

	{!! Form::open() !!}	
   
      <div class="form-group has-feedback">
        <input name="email" type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
	  {!! csrf_field() !!}
   {!! Form::close() !!}

    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
     @endforeach
  <!--  <a href="#">I forgot my password</a><br>
    <a href="URL::to('register')" class="text-center">Register a new membership</a>
-->
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->

@include('common/footer')