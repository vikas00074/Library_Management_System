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
				margin: 5%;
				font-size: 20px;
			}
			#wrapper-content{
				padding: 40px;
				background: #ccf2ff;
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
			<div class="container">
				<div class="row">
					<div class="col-md-offset-2 col-md-8">
						<img src="images/lbLogo.png" alt="logo" width="300px" height="100px">
						<h3 class="text-uppercase">Admin || Login</h3>

						<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
							<table class="table table-bordered">
								<tr>
									<td><label>Enter User Id:</label></td>
									<td><input class="text-dark" type="text" placeholder="Enter User Id.." name="userId" required></td>
								</tr>
								<tr>
									<td><label>Password:</label></td>
									<td><input class="text-dark" type="password" placeholder="Enter password" name="pass"></td>
								</tr>
								<tr>
									<td><input class="btn btn-danger" type="submit" name="submit" value="Submit"></td>
									<td><a href="register.php" class="btn btn-success" type="submit" name="register">Sign Up</a></td>
								</tr>
							</table>
						</form>

						<?php
							if (isset($_POST['submit'])) {
								include 'config.php';
								
								$userId = $_POST['userId'];
								$pass = $_POST['pass'];
								$sql = "SELECT * FROM admin WHERE admin_id = '{$userId}' AND pass = '{$pass}'";
								$result = mysqli_query($conn, $sql) or die("Query Failed");
								if (mysqli_num_rows($result) > 0) {
									while ($row = mysqli_fetch_assoc($result)) {
										session_start();
										$_SESSION["userId"] = $row["admin_id"];
										$_SESSION["password"] = $row["pass"];
										$_SESSION["name"] = $row["admin_name"];
										header("Location: userDashboard.php");
									}
								}
								else
								{
									echo '<div class="alert alert-danger">Username and Password are not matched.</div>';
								}
							}

							if (isset($_POST['register'])) {
								header("Location: register.php");
							}
						?>
					</div>
				</div>
			</div>
		</div>
	
<?php include 'footer.php' ?>