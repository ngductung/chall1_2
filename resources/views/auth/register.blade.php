<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Register</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/uniform/css/default.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet" />

    <!-- Theme Styles -->
    <link href="{{ asset('assets/css/space.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <!-- Page Container -->
    <div class="page-container">
        <!-- Page Inner -->
        <div class="page-inner login-page">
            <div id="main-wrapper" class="container-fluid">
                <div class="row">
                    <div class="col-sm-6 col-md-3 login-box">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <h4 class="login-title">Create an account</h4>
                        <form method="post" action="{{ route('create') }}">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="exampleInputFirstName">Mã sinh viên (Username)</label>
                                <input required name="username" type="text" class="form-control"
                                    id="exampleInputFirstName" value="{{ old('username') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLastName">Họ tên</label>
                                <input required name="name" type="text" class="form-control"
                                    id="exampleInputLastName" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLastName">Email</label>
                                <input name="email" type="email" class="form-control" id="exampleInputLastName"
                                    value="{{ old('mail') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputLastName">Số điện thoại</label>
                                <input name="phone" type="text" class="form-control" id="exampleInputLastName"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword">Password</label>
                                <input required name="password" type="password" class="form-control"
                                    id="exampleInputPassword" value="{{ old('password') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                        <br>
                        <a href="{{ route('login') }}" class="btn btn-default">Login</a><br>
                    </div>
                </div>

            </div>
        </div><!-- /Page Content -->
    </div><!-- /Page Container -->


    <!-- Javascripts -->
    <script src="{{ asset('assets/plugins/jquery/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/uniform/js/jquery.uniform.standalone.js') }}"></script>
    <script src="{{ asset('assets/plugins/switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/js/space.min.js') }}"></script>
</body>

</html>
