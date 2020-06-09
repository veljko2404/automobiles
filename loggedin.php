<?php 
		$user_id = $_SESSION['user_id'];
		$query = "SELECT * FROM `users` WHERE `id`='".$user_id."'";
		$query_run = mysqli_query($conn, $query);
		$user_i = mysqli_fetch_assoc($query_run);
?>
<!DOCTYPE html>
<html lang="">
<head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
		.drpdwn {
			position:fixed;
			top:10px;
			left:10px;
			z-index:10;
			border:none;
			cursor:pointer;
			border-radius: 3px;
			padding:7px 15px;
			transition: 0.5s;
			background-color:rgba(0,0,0,0.5);
		}
		.drpdwn:active {
			border: none;
		}
		.drpdwn:hover, #shoping_cart:hover {
			color:white !important;
		}
		.linkdrp:hover {
			background-color: #007bff;
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
		#drpdwnicon {
			position:absolute;
		}
	</style>
	
</head>
<body>
	<div class="dropdown">
    <button class="btn dropdown-toggle drpdwn text-primary" data-toggle="dropdown">
      Profile
    </button>
    <div class="dropdown-menu">
      <p class="dropdown-header">username</p>
      <p class="dropdown-item linkdrp"><?php echo $user_i['username']; ?></p>
      <div class="dropdown-divider"></div>
      <p class="dropdown-header">gmail</p>
      <p class="dropdown-item linkdrp"><?php echo $user_i['email']; ?></p>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item linkdrp" href="settings.php">Profile Settings</a>
      <a href="logout.php" class="dropdown-item linkdrp">Log out</a>
      
      <?php     	
      	if($user_id==14) {
      		$_SESSION['add_confirm']=14;
      ?>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item linkdrp" href="add.php">Add car</a>
      <?php	} 

      ?>
    </div>
  </div>
	<div style="width:100%;">
		<div class="headertext">
			<h1 class="text-center text-primary text-center">Buy cars for best prices !</h1>
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
	<a href="cart.php">
		<i class="fa fa-shopping-cart text-center text-primary" id="shoping_cart">
			<span class="badge" id="badge"><?php if(isset($_SESSION["car"])) { echo count($_SESSION["car"]); } else {echo 0;} ?></span>
		</i>
	</a>
</body>
</html>