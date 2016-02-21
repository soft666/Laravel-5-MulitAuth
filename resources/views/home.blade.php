<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Auth-Multi-Guard</title>

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
                <a class="navbar-brand" href="#">Auth-Multi-Guard</a>
            </div>

        </div>
    </nav>

    <div class="container">
        <div class="row vertical-offset-100">
            <div class="col-md-8 col-md-offset-2">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Auth-Multi-Guard</h3>
                        </div>
                        <div class="panel-body">
                            
                            {!! Form::open(['class' => 'form-horizontal']) !!}
                                
                                @if(!Auth::guard('web_admins')->check())
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="{{ URL::route('LoginAdminGet') }}" class="btn btn-primary btn-block">
                                                <i class="fa fa-btn fa-sign-in"></i>Admin Login
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="{{ URL::route('LoginAdminGet') }}" class="btn btn-success btn-block">
                                                <i class="fa fa-btn fa-sign-in"></i> {{ Auth::guard('web_admins')->user()->name }} Success
                                            </a>
                                        </div>
                                    </div>
                                @endif

                                @if(!Auth::guard('web_customers')->check())
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="{{ URL::route('LoginCustomerGet') }}" class="btn btn-primary btn-block">
                                                <i class="fa fa-btn fa-sign-in"></i>Customer Login
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <a href="{{ URL::route('LoginCustomerGet') }}" class="btn btn-success btn-block">
                                                <i class="fa fa-btn fa-sign-in"></i> {{ Auth::guard('web_customers')->user()->name }} Success
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                
                            {!! Form::close() !!}

                        </div>
                    </div>

            </div>
        </div>
    </div>

</body>
</html>