<?php

$user = "root";
$pass = "";
$host = "localhost";
$db = "cars";

$conn = mysqli_connect($host, $user, $pass);

mysqli_select_db($conn, $db);



?>