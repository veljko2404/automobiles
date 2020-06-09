<?php

ob_start();

session_start();

function loggedin() {
	if(isset($_SESSION['user_id'])&&!empty($_SESSION['user_id'])) {
		return true;
	}
}
if(isset($_SERVER['HTTP_REFERER'])&&!empty($_SERVER['HTTP_REFERER'])) {
	$http_referer = $_SERVER['HTTP_REFERER'];
}
?>