<?php
session_start();
require 'connect.php';

echo 'Youre registered<br>';
$username = $_SESSION['username'];
echo "Your username is ".$username;
$query = "SELECT `id` FROM `users`WHERE `username`='".$username."'";
$query_run = mysqli_query($conn, $query);
$user_i = mysqli_fetch_assoc($query_run);
$id = $user_i['id'];
$_SESSION["user_id"] = $id;

echo '<br><a href="index.php">Go to main page</a>';

?>