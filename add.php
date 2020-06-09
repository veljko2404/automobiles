<?php
	session_start();
	require 'connect.php';
	$id_ok = $_SESSION["add_confirm"];
	if($id_ok==14) {
		if(isset($_POST["name_car"])&&isset($_POST["type_car"])&&isset($_POST["price_car"])) {
			$name_car = $_POST["name_car"];
			$type_car = $_POST["type_car"];
			$price_car = $_POST["price_car"];
			if(!empty($name_car)&&!empty($type_car)&&!empty($price_car)) {
				$target_dir = $name_car."/uploads/";
				$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
				$image_car = basename($_FILES["file_to_upload"]["name"]);
				if(!file_exists($target_file)) {
					$query = "INSERT INTO ".$name_car." VALUES('','$name_car','$type_car','$price_car','$image_car')";
						if(move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)&&mysqli_query($conn, $query)) {
							Header("Location: ".$name_car."/");
						}
				} else {
					$file_exists = "File already exists !";
				}
			} else {
				$empty_error = "All fileds must be filed in !";
			}
		}
?>
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

	<title>Add Automobiles</title>
	<style>
		form {
			top:50%;
			left:50%;
			transform: translate(-50%, -50%);
			position:absolute;
			padding:25px;
			box-shadow: 0 8px 16px 8px rgba(0,0,0,0.2), 0 15px 20px 15px rgba(0,0,0,0.1);
		}
		input {
			box-shadow: 0 2px 4px 2px rgba(0,0,0,0.2), 0 5px 7px 5px rgba(0,0,0,0.1);
			width:100%;
			transition: 0.5s;
		}
	</style>
	
</head>
<body>

	<div class="container">
		<form action="add.php" method="post" enctype="multipart/form-data">
			<h2 class="text-center text-success">Add car here:</h2><br>
			<input type="name" name="name_car" placeholder="Enter name..." autocomplete="on" value="<?php if(isset($name_car)) {echo $name_car;} ?>"><br><br>
			<input type="name" name="type_car" placeholder="Enter type..." autocomplete="on" value="<?php if(isset($type_car)) {echo $type_car;} ?>"><br><br>
			<input type="number" name="price_car" placeholder="Enter price..." autocomplete="on" value="<?php if(isset($price_car)) {echo $price_car;} ?>"><br><br>
			<h4 class="text-info">Select image:</h4>
			<input type="file" name="file_to_upload" class="btn" style="cursor:pointer;padding:5px !important;"><hr>
			<input type="submit" value="Uplaod car" class="btn btn-primary" style="cursor:pointer">
			<h5 class="text-danger"><?php if(isset($empty_error)) {echo $empty_error;} ?><?php if(isset($file_exists)) {echo $file_exists;} ?></h5>
		</form>
	</div>

</body>
</html>
<?php } else {
		echo '<script>alert("something went wrong")</script>';
		Header("Location: /automobiles/");	
	} ?>