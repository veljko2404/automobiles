<?php

	if(isset($_POST['username'])&&isset($_POST['email'])&&isset($_POST['password'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$password_md = md5($password);
		if (!empty($username)&&!empty($email)&&!empty($password_md)) {
			$query = "SELECT `username` FROM `users` WHERE `username`='username'";
			$query_run = mysqli_query($conn, $query);
			if(mysqli_num_rows($query_run)==1) {
				$err_input1 = 'Username is already taken!';
			} else {
				$query_reg = "INSERT INTO `users` VALUES('', '".addslashes($username)."', '".addslashes($password_md)."','".$password."', '".addslashes($email)."', '')";
				if($query_run = mysqli_query($conn, $query_reg)) {
					$_SESSION['username'] = $username;
					header("Location: regsuccess.php");
				} else {
					echo 'query problem';
				}
			}
		} else {
			echo 'fields are emtpy';
		}
	}
?>
					<form action="index.php" method="post" class="login">
						<input type="name" name="username" autocomplete="off" placeholder="Enter username"><br><br>
						<input type="email" name="email" autocomplete="off" placeholder="Enter email"><br><br>
						<input type="password" name="password" autocomplete="off" placeholder="Enter password"><br><br>
						<input type="submit" value="Sign up" class="btn btn-success">
						<h2><?php if(isset($err_input1)) { echo $err_input1; } ?></h2>
					</form>