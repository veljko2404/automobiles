<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="" /> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="icon" sizes="196x196" href="">
	<link rel="apple-touch-icon" href="">
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width, inital-scale=1.0" />
	<meta name="keywords" content="" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<title>Buy your car now !</title>
	<style>
	#header {
			background-image:url(photos/bgheader.jpg);
			background-repeat: no-repeat;
			background-position: cover;	
			height:500px; 
			opacity:0.7;
		}
		.headertext {
			position:absolute;
			top:200px;
			left:50%;
			transform: translate(-50%, -50%);
			z-index:10;
			background-color: rgba(0,0,0,0.6);
			padding:25px;
			border-radius: 10px;
		}
		#typeCar {
			float:left;
			margin-top:20px;
			padding:2.12% 2.12% 0.5% 2.12%;
		}
		img {
			box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 15px 20px 15px rgba(0,0,0,0.1);
			transition: .5s;
			border-radius: 10px;
		}
		img:hover, #textcar:hover {
			opacity:0.9;
	}
		#textcar {
			position:absolute;
			padding:15px;
			border-radius: 10px;
			background-color: rgba(0,0,0,0.7);
			top:50%;
			left:50%;
			transform: translate(-50%, -50%);
			-ms-transform: translate(-50%, -50%);
			z-index: 10;
		}
		#login {
			position:fixed;
			top:10px;
			left:10px;
			z-index:10;
			background-color: rgba(0,0,0,0.5);
			border:none;
			cursor:pointer;
			border-radius: 3px;
			padding:3px 5px;
			transition: 0.5s;
		}
		#signup {
			transition: 0.5s;
			position:fixed;
			top:10px;
			left:70px;
			z-index:10;
			background-color: rgba(0,0,0,0.5);
			border:none;
			cursor:pointer;
			border-radius: 3px;
			padding:3px 5px;
		}
		#login:hover, #signup:hover, #shoping_cart:hover {
			color:white !important;
		}
		#shoping_cart {
			position:fixed;
			top:10px;
			right:10px;
			z-index:10;
			font-size:40px;
			background-color: rgba(0,0,0,0.5);
			padding:5px 10px;
			border-radius: 5px;
			cursor:pointer;
			transition: 0.5s;
		}
		#badge {
			position:absolute;
			top:10px;
			left:-10px;
			z-index:10;
			color:white ;
		}
	</style>
	
</head>
<body>

	<button id="login" class="text-primary" data-toggle="modal" data-target="#mymodal">Log in</button>
	<div class="modal fade" id="mymodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title text-dark" style="opacity:0.75;">Log in</h3>
					<button class="close" data-dismiss="modal"  style="cursor:pointer">&times;</button>
				</div>
				<div class="modal-body">
					
					<?php require 'loginindex.php'; ?>

				</div>
				<div class="modal-footer">
					<button class="btn btn-success"  style="cursor:pointer" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<button id="signup" class="text-primary" data-toggle="modal" data-target="#mymodal1">Sign up</button>
	<div class="modal fade" id="mymodal1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title text-dark" style="opacity:0.75;">Sign up</h3>
					<button class="close" data-dismiss="modal"  style="cursor:pointer">&times;</button>
				</div>
				<div class="modal-body">
					
					<?php require 'signupindex.php'; ?>

				</div>
				<div class="modal-footer">
					<button class="btn btn-success"  style="cursor:pointer" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div style="width:100%;">
		<div class="headertext">
			<h1 class="text-center text-primary">Buy cars for best prices !</h1>
		</div>

		<div id="header" style="width:100%;padding:50px 0 50px 0;">	
		</div>
		
		<div class="container-fluid" id="types">
			<div id="typeCar" class="col-4" style="margin-left:-10px;">
				<a href="audi/">
					<h2 class="text-center text-info" id="textcar">Audi</h2>
					<img src="photos/audi-logo.jpg" style="width:100%;height:100%;">
				</a>
			</div>
			</div>
			<div id="typeCar" class="col-4">
				<a href="bmw/">
					<h2 class="text-center text-info" id="textcar">BMW</h2>
					<img src="photos/bmw-logo.jpg" style="width:100%;height:100%;">
				</a>
			</div>
			<div id="typeCar" class="col-4">
				<a href="lamborghini/">
					<h2 class="text-center text-info" id="textcar">Lambo</h2>
					<img src="photos/lamborghini-logo.jpg" style="width:100%;height:100%;">
				</a>
			</div>
			<div id="typeCar" class="col-4">
				<a href="landrover/">
					<h2 class="text-center text-info" id="textcar">Land Rover</h2>
					<img src="photos/landrover-logo.jpg" style="width:100%;height:100%;">
				</a>
			</div>
			<div id="typeCar" class="col-4">
				<a href="mercedes/">
					<h2 class="text-center text-info" id="textcar">Mercedes</h2>
					<img src="photos/mercedes-logo.jpg" style="width:100%;height:100%;">
				</a>
			</div>
			<div id="typeCar" class="col-4">
				<a href="porsche/">
					<h2 class="text-center text-info" id="textcar">Porsche</h2>
					<img src="photos/porsche-logo.jpg" style="width:100%;height:100%;">
				</a>
			</div>
			
		</div>
	</div>

</body>
</html>