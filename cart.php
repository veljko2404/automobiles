<?php
session_start();
require 'connect.php';
if(empty($_SESSION["car"])) {
	echo '<script>alert("cart is empty")</script>';
	echo '<script>window.history.back()</script>';
} else {
	if(isset($_GET["action"])) {
	if($_GET["action"] == "delete") {
		foreach($_SESSION["car"] as $keys => $values) {
			if($values["car_id"] == $_GET["id"]) {
				unset($_SESSION["car"][$keys]);
					echo '<script type="text/javascript">alert("item <?php echo $_SESSION["car"][$keys]; ?>removed")</script>';
				echo '<script type="text/javascript">window.location="cart.php"</script>';
			}
		}
	}
}

$user_id = $_SESSION['user_id'];
$query = "SELECT * FROM `users` WHERE `id`='".$user_id."'";
$query_run = mysqli_query($conn, $query);
$user_i = mysqli_fetch_assoc($query_run);
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
	<title></title>
	<style>
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
			background-color:rgba(0,0,0,0.7);
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
    </div>
  </div>
<div class="container">
	<?php if(isset($message)) {echo $message;} ?>
	<div class="table-responsive">
		<table class="table table-striped text-center">
			<tr>
				<th width="25%">Car</th>
				<th width="25%">Car type</th>
				<th width="25%">Price</th>
				<th width="25%">Remove</th>
			</tr>
		<?php
			$total = 0;
			foreach($_SESSION["car"] as $keys => $values) {
		?>
			<tr>
				<td width="25%"><?php echo $values["car"] ?></td>
				<td width="25%"><?php echo $values["car_type"]; ?></td>
				<td width="25%"><?php echo "$ ".number_format($values["car_price"]); ?></td>
				<?php $total = $total + $values["car_price"]; ?>
				<th width="25%"><a class="text-danger text-center" href="cart.php?action=delete&id=<?php echo $values['car_id']; ?>">Remove</a></th>
			</tr>
			<?php } ?>
			<tr>
				<th width="25%"></th>
				<th width="25%">Total:</th>
				<th width="25%"><?php echo "$ ".number_format($total); $_SESSION["price"] = $total; ?></th>
				<th width="25%"><a href="buy.php" class="text-primary">Buy</a></th>
			</tr>
		</table>
	</div>
</div>
</body>
</html>
<?php } ?>