<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Admin</title>

	<!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
	
	<style type="text/css">
		.vertical-offset-100{
		    padding-top:100px;
		}
	</style>

</head>
<body>

	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Auth-Admin</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="/">Home</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(Auth::guard('web_admins')->check())
						<li><a href="{!! URL::route('LogOutAdmin') !!}">Logout</a></li>
					@else
						<li><a href="#">Login</a></li>
					@endif
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

	<div class="container">
		<div class="row vertical-offset-100">
			<div class="col-md-8 col-md-offset-2">
				
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Login Admin</h3>
						</div>
						<div class="panel-body">
							
							{!! Form::open(['class' => 'form-horizontal', 'route' => 'LoginAdminPost']) !!}
								
		                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		                            <label class="col-md-4 control-label">E-Mail Address</label>

		                            <div class="col-md-6">
		                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

		                                @if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		                            <label class="col-md-4 control-label">Password</label>

		                            <div class="col-md-6">
		                                <input type="password" class="form-control" name="password">

		                                @if ($errors->has('password'))
		                                    <span class="help-block">
		                                        <strong>{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <div class="checkbox">
		                                    <label>
		                                        <input type="checkbox" name="remember"> Remember Me
		                                    </label>
		                                </div>
		                            </div>
		                        </div>

		                        <div class="form-group">
		                            <div class="col-md-6 col-md-offset-4">
		                                <button type="submit" class="btn btn-primary">
		                                    <i class="fa fa-btn fa-sign-in"></i>Login
		                                </button>

		                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>
		                            </div>
		                        </div>
								
							{!! Form::close() !!}

						</div>
					</div>

			</div>
		</div>
	</div>

</body>
</html>