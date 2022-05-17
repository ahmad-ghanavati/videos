@extends('auth-layout')
@section('class-body', 'sing-up-page')
@section('content')
<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Video Post – Video Sharing HTML Template</title>
        <meta name="keywords" content="Blog website templates" />
        <meta name="description" content="Author - Personal Blog Wordpress Template">
        <meta name="author" content="Rabie Elkheir">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Owl Carousel Assets -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"  type="text/css" />

        <!--Google Fonts-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800|Raleway:400,500,700|Roboto:300,400,500,700,900|Ubuntu:300,300i,400,400i,500,500i,700" rel="stylesheet">
        <!-- Main CSS -->
        <link rel="stylesheet" href="css/style.css" />
        <!-- Responsive CSS -->
        <link rel="stylesheet" href="css/responsive.css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>

    <body class="log_in_page">
      <!--======= log_in_page =======-->
      <div id="log-in" class="site-form log-in-form">
      
      	<div id="log-in-head">
        	<h1>ورود</h1>
            <div id="logo"><a href="01-home.html"><img src="img/logo.png" alt=""></a></div>
        </div>
        
        <div class="form-output">
        	<form action="{{ route('login.store') }}" method="post">
                @csrf
                <x-validation-errors></x-validation-errors>
				<div class="form-group label-floating">
					<label class="control-label">ایمیل</label>
					<input class="form-control" name="email" placeholder="" type="email">
				</div>
				<div class="form-group label-floating">
					<label class="control-label">رمز عبور</label>
					<input class="form-control" name="password" placeholder="" type="password">
				</div>
                
				<div class="remember">
					<div class="checkbox">
						<label>
							<input name="remember" type="checkbox">
								مرا به خاطر بسپار
						</label>
					</div>
					<a href="#" class="forgot">رمز عبور من را فراموش کرده ام</a>
				</div>
                
				<button  class="btn btn-lg btn-primary full-width">ورود</button>

				<p>آیا شما یک حساب کاربری ندارید؟ <a href="{{ route('register.create') }}">ثبت نام کنید!</a> </p>
            </form>
        </div>
      </div>
      <!--======= // log_in_page =======-->
	</body>

</html>
@endsection