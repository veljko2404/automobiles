<?php
require 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_POST['new_pass'])&&isset($_POST['current_pass'])) {
	$current = $_POST['current_pass'];
	$new = $_POST['new_pass'];
	$new_md = md5($new);
	if(!empty($current)&&!empty($new)) {
		$query = "SELECT `realpass` FROM `users` WHERE `id`='".$user_id."' AND `realpass`='".$current."'";
		if($query_run = mysqli_query($conn, $query)) {
			if(mysqli_num_rows($query_run)==1) {
				$query_sec = "UPDATE `users` SET `realpass`='".$new."', `password`='".$new_md."' WHERE `users`.`id`='".$user_id."'";
				if(mysqli_query($conn, $query_sec)) {
					$info = 'Password has been changed';
				}
			} else {
				$err_pass = 'current password doesnt match';
			}
		}
	} else {
		$err = 'all fields must be filled in';
	}
}

$query = "SELECT * FROM `users` WHERE `id`='".$user_id."'";
$query_run = mysqli_query($conn, $query);
$user_i = mysqli_fetch_assoc($query_run);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
	<title>Settings</title>
	<style type="text/css">
		#pass {
			display:none;
		}
		#change {
			display: none;
		}
		#passchange {
			display: none;
		}
		.header {
			width:100%;
			background-color: rgba(0,0,0,0.2);
			padding:10px;
		}
		#back {
			position:fixed;
			top:15px;
			left:15px;
			z-index:10;
			background-color: rgba(0,0,0,0.7) !important;
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
	<script type="text/javascript">
		function see() {
			var x = document.getElementById('passbtn');
			var y = document.getElementById('pass');
			var z = document.getElementById('change');
			y.style.display = "block";
			x.style.display = "none";
			z.style.display = "block";
		}
		function change() {
			var i = document.getElementById('passchange');
			i.style.display = "block";
		}
	</script>
</head>
<body>
	<a href="index.php" class="text-primary" id="back">Go back</a>

<h1 class="text-info text-center header">
			Settings
		</h1>
	<div class="container">
		<div class="container-fluid"><hr>
			<h2 class="text-primary">
				User Name: <span class="text-success"><?php echo $user_i['username']; ?></span>
			</h2>
			<h2 class="text-primary">
				Email: <span class="text-success"><?php echo $user_i['email']; ?></span>
			</h2>
			<h2 class="text-primary" style="float:left;">Password:&nbsp;</h2>
				<h3><?php if(isset($info)) {echo $info;} ?></h3>
				<h2 class="text-success" id="pass"> <?php echo $user_i['realpass']; ?> </h2>
				<button class="btn btn-success" id="passbtn" onclick="see()">See password</button><br>
				<button class="btn btn-primary text-white" id="change" style="cursor:pointer;" onclick="change()">Change password</button>
			<hr>
		</div>
		<form action="settings.php" method="post" id="passchange">
			<input type="name" name="current_pass" placeholder="Current password"><br><br>
			<input type="name" name="new_pass" placeholder="New password"><br><br>
			<input type="submit" class="btn btn-success">
			<h2 class="text-danger"><?php if(isset($err)) { echo $err; } ?></h2>
			<h2 class="text-danger"><?php if(isset($err_pass)) { echo $err_pass; } ?></h2>
		</form>
	</div>

</body>
</html>