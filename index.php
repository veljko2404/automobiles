<?php

require 'core.php';

require 'connect.php';

if(loggedin()) {
	require 'loggedin.php';
} else {
	require 'notloggedin.php';
}

?>