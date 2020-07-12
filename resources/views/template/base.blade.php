<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ask Mee</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href=""/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{url('/')}}/css/style.css">

	<link rel="shortcut icon" href="{{url('images/fav.png')}}" type="image/png"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Maven+Pro:400,500&amp;subset=vietnamese" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" rel="stylesheet" type="text/css"> 

	<link rel="stylesheet" href="plugins/animatedSelectBox/sumoselect.css"> 
	<link rel="stylesheet" href="plugins/loading.css"> 
	<link rel="stylesheet" href="plugins/loading-btn.css"> 
	<link href="https://unpkg.com/ionicons@4.2.4/dist/css/ionicons.min.css" rel="stylesheet">
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet"> 
	<link rel="stylesheet" href="css/fontawesome/css/font-awesome.min.css" >
	<link rel="stylesheet" href="css/animation.css" >
	@stack('style')
</head>
<body>
	@include('template.header')
	<div class="main-body" style="min-height: 78vh">
		<div class="container custom"   style="padding: 10px">
			@include('template.notif')
		</div>
		@yield('content')
	</div>

	@include('template.auth-modal')
</div>
<footer class="custom">
	<div class="main-foter">
		
	</div>
</footer>
<div class="footer-copyright foter">
	<div class="container-fluid text-center" > 
		<span class=""><a class="poweredby-foter" href="http://arrazymuhammad.com">Ar-Razy Muhammad</a></span>
	</div>
</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	@stack('script')
</body>
</html>