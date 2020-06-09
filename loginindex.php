<?php

if(isset($_POST['username_login'])&&isset($_POST['password_login'])) {
	$username = $_POST['username_login'];
	$password = $_POST['password_login'];
	$password_md = md5($password);	
	if(!empty($username)&&!empty($password_md)) {
		$query = "SELECT `id` FROM `users` WHERE `username`='".$username."' AND `password`='".$password_md."'";
		if($query_run = mysqli_query($conn, $query)) {
			$query_num_rows = mysqli_num_rows($query_run);
			if($query_num_rows==0) {
				$err_input = 'Wrong email or password';
			} elseif($query_num_rows==1) {
				$user_id = mysqli_fetch_assoc($query_run);
				$id = $user_id['id'];
				$_SESSION['user_id'] = $id;
				header("Location: /automobiles/");
			}
		}
	}
} 
?>
					<form action="index.php" method="post" class="login">
						<input type="name" name="username_login" autocomplete="off" placeholder="Enter username"><br><br>
						<input type="password" name="password_login" autocomplete="off" placeholder="Enter password"><br><br>
						<input type="submit" value="Log in" class="btn btn-primary">
						<h2><?php if(isset($err_input)) { echo $err_input; } ?></h2>
					</form>