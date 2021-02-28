<?php
include 'config.php';
session_start();
if(isset($_SESSION['userID'])){
	header("Location: userDashboard.php");
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Library Management System</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/custom.css">
		<style>
			body{
				background: #f1f1f1;
				margin: 1% 3% 0 3%;
				font-size: 20px;
			}
			#wrapper-content{
				padding: 5px;
				background: #ccf2ff;
			}
			.pad{
				margin-left: 100px;
			}
			.footer{
				color: white;
				background: black;
				font-family: sans-serif;
				font-size: 21px;
			}
		</style>
	</head>
	<body>
		<div id="wrapper-content" class="body-content">
			<div class="container p-3">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<img src="images/lbLogo.png" alt="logo" width="300px" height="100px">
						<h3 class="text-uppercase">New User Sign Up</h3>
						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
							<table class="table table-bordered">
								<tr>
									<td><label>Enter Name</label></td>
									<td><input class="text-dark" type="text" placeholder="" name="name" required></td>
								</tr>
								<tr>
									<td><label>Enter Phone</label></td>
									<td><input class="text-dark" type="text" placeholder="" name="phone" required></td>
								</tr>
								<tr>
									<td><label>Enter Post</label></td>
									<td><input class="text-dark" type="text" placeholder="" name="post"></td>
								</tr>
								<tr>
									<td><label>Enter City</label></td>
									<td><input class="text-dark" type="text" placeholder="" name="city"></td>
								</tr>
								<tr>
									<td><label>Enter Password</label></td>
									<td><input class="text-dark" type="password" placeholder="Enter password" name="pass"></td>
								</tr>
								<tr>
									<td><label>Confirm Fassword</label></td>
									<td><input class="text-dark" type="password" placeholder="Confirm password" name="pass1"></td>
								</tr>
								<tr>
									<td><input class="btn btn-success" type="submit" name="register" value="Register"></td>
								</tr>
							</table>
						</form>
						<?php
							if (isset($_POST['register'])) {
								include 'config.php';
								$name = $_POST['name'];
								$randomid = mt_rand(100000,999999);
								
								if ($_POST['pass'] == $_POST['pass1']) {
									$pass = $_POST['pass1'];
									$sql = "INSERT INTO admin VALUES('{$randomid}','{$pass}','$_POST[name]', '$_POST[phone]', '$_POST[post]', '$_POST[city]')";
									//echo $sql;
									$result = mysqli_query($conn, $sql) or die("Query Failed");
									if ($result) {
											$sql1 = "SELECT * FROM admin WHERE admin_name = '$name'";
											$query_run = mysqli_query($conn, $sql1);
											if (mysqli_num_rows($query_run) > 0) {
										while ($row = mysqli_fetch_assoc($query_run)) {
											session_start();
											$_SESSION["userId"] = $row["admin_id"];
											$_SESSION["password"] = $row["pass"];
											$_SESSION["name"] = $row["admin_name"];
											header("Location: userDashboard.php");
										}
									}
								}
							} else{
									echo '<div class="alert alert-danger">Password Does not matched</div>';
								}	
							}
							?>
					</div>
				</div>
			</div>
		</div>
	
	<?php include 'footer.php'; ?>