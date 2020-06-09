<?php
	session_start();
	require "connect.php";
	if(isset($_POST["id"])) {
	if(isset($_SESSION['user_id'])) {
		$id = $_POST["id"];
		if(!empty($id)){
			$query = "SELECT * FROM landrover WHERE id='$id'";
			if($query_run = mysqli_query($conn, $query)) {
				while($q_row = mysqli_fetch_assoc($query_run)) {
					if(!empty($_SESSION["car"])) {
						if($id !== $_SESSION["count"]) {
						$count = count($_SESSION["car"]);
						 $array_id = $_SESSION["car"][$count]["car_id"];					 
						 
						 	$car_array = array(
						 		'car_id' => $q_row["id"],
        						'car' => $q_row["car"],
        						'car_type' => $q_row["type"],
       							'car_price' => $q_row["price"]
						 	);
						 	 $_SESSION["car"][$count] = $car_array;
						 } else {
						 	echo '<script>alert("Car Already added")</script>';
						 	echo '<script>window.location("index.php")</script>';
						 }
					} else {
						$car_array = array(
						 		'car_id' => $q_row["id"],
        						'car' => $q_row["car"],
        						'car_type' => $q_row["type"],
       							'car_price' => $q_row["price"]
						 );
						 	 $_SESSION["car"][0] = $car_array;
						 	 $_SESSION["count"] = $id;
							echo '<script>alert("Car added to shopping cart")</script>';
					}
				}
			}
		}
		} else {
 		echo '<script>alert("You must be logged in")</script>';
 	}
	}
	 ?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="style.css" /> 
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
	<title></title>
	<style>
		#headertext {
			background-color: rgba(0,0,0,0.1);
			padding:10px 15px;
			margin-bottom:25px;
		}
		#types {
			border:1px solid rgba(0,0,0,0.6);
			float:left;
			padding:0 !important;
			margin:10px 0;
		}
		#types img {
			width:100%;
			box-shadow: 0 0px 4px 0px rgba(0,0,0,0.2), 0 0px 8px 0px rgba(0,0,0,0.1);
			margin-bottom:10px;
		}
		form {
			padding:20px 0;
		}
		form input {
			position:relative;
			left:50%;
			transform: translate(-50%, 0);
			cursor:pointer;
		}
		#back {
			position:fixed;
			top:15px;
			left:15px;
			z-index:10;
			background-color: rgba(0,0,0,0.6);
			border:none;
			cursor:pointer;
			border-radius: 3px;
			padding:5px;
			transition: 0.5s;
		}
		#back:hover {
			color:white !important;
		}
	</style>
	
</head>
<body>
<a href="/automobiles/cart.php">
	<i class="fa fa-shopping-cart text-center text-primary" id="shoping_cart">
		<span class="badge" id="badge"><?php if(isset($_SESSION["car"])) { echo count($_SESSION["car"]); } else {echo 0;} ?></span>
	</i>
</a><a href="/automobiles/" class="text-primary" id="back">Go back</a>
	<h1 id="headertext" class="text-center text-info">Land Rover catalog</h1>
	<div class="container-fluid">
		<div class="container" id="catalog">
			<?php 
			$query = "SELECT * FROM landrover ORDER BY id ASC";
			$query_run = mysqli_query($conn, $query);
			if(mysqli_num_rows($query_run) > 0) {
				while($row = mysqli_fetch_array($query_run)) {
				?>
			<div class="col-4" id="types">
				<img src="uploads/<?php echo $row["image"]; ?>"><br>
				<h2 class="text-info text-center">Land Rover <?php echo "<pre style='overflow:hidden;' class='text-info'>".$row["type"]."</pre>"; ?></h2><hr>
				<h3 class="text-center text-primary">$<?php echo number_format($row["price"]); ?></h3><hr>
				<form action="index.php" method="post">
					<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
					<input type="submit" class="btn btn-success" value="Buy">
				</form>
			</div>
			<?php } } ?>
		</div>
	</div>

</body>
</html>