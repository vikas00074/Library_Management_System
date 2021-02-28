<?php
	include 'config.php';
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/custom.css">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Brygada+1918:wght@500&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<style>
			.head{
				width: 100%;
				height: 75px;
				margin-top: 20px;
			}
			.head .set{
				font-family: 'Brygada 1918', serif;
				font-size: 21px;
				word-spacing: 5px;
				letter-spacing: 2px;
			}
			.info{
				background-color: #5c0099;
			}
			.info:hover{
				background-color: black;
			}
			.info-set{
				display: flex;
				justify-content: space-around;
			}
			.info ul li{
				list-style: none;
			}
			.info ul li a{
				text-decoration: none;
				color: #fff;
				letter-spacing: 2px;
			}
			.info ul li a:hover{
				color: #fff;
				font-weight: bold;
				text-transform: uppercase;
				letter-spacing: 2px;
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
		<div class="d-flex justify-content-around py-3 head">
			<img src="images/lbLogo.png" alt="">
			<div class="text-uppercase set">Library Management System</div>
			<div class="text-uppercase set">User Id: <strong style="background: #d6faa5;"><?php echo $_SESSION['userId']; ?></strong></div>
			<div class="text-uppercase set">Name: <strong style="background: #d6faa5;"><?php echo $_SESSION['name']; ?></strong> <a href="logout.php">Logout</a>
		</div>
	</div>
	<div class="info">
		<ul class="info-set">
			<li><a href="userDashboard.php" id="first">Home</a></li>
			<li><a href="books.php">Books</a></li>
			<li><a href="members.php">Members</a></li>
		</ul>
	</div>