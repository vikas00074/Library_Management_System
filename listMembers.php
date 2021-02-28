<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Dashboard</title>
		<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
		<!-- <link rel="stylesheet" href="css/custom.css"> -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script>
		$(document).ready(function(){
			$("#btn1").click(function(){
				//alert("Button is clicked");
				$(".box").hide();
			});
		});
		</script>
	</head>
	<body>
		<div class="left-side">
			<ul><form method="post" action="">
				<li><input type="submit" value="Member List" name="member_list" id="btn1"></input></li>
				<li><input type="submit" value="Add new Memeber" name="add_member"></li>
				<li><input type="submit" value="Edit Member" name="edit_member"></li>
			</form>
		</ul>
	</div>
	<div class="right-side">
		<div id="show">
			<p>Welcome to Member Management</p>
			<img src="images/member.jpg" alt="member">
		</div>
		<div class="box">
			<?php if (isset($_POST['member_list'])) { ?>
			<form action="" method="post">
				<input type="text" name="course" placeholder="Enter Student Name" required>
				<input type="submit" name="search" value="Search">
			</form>
			<br>
			<?php } ?>
			<div>
				<?php if (isset($_POST['search'])) {
					include 'config.php';
					$Sql = "SELECT * FROM members";
					$query = mysqli_query($conn, $Sql);
				while ($row = mysqli_fetch_assoc($query)) { ?>
				
				
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Name</th>
							<th>Course</th>
							<th>Mobile</th>
							<th>Year</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><?php echo $row['member_name']; ?></td>
							<td><?php echo $row['member_course']; ?></td>
							<td><?php echo $row['member_phone']; ?></td>
							<td><?php echo $row['admis_year']; ?></td>
						</tr>
					</tbody>
				</table>
				<?php } } ?>
			</div>
			<?php if (isset($_POST['add_member'])) { ?>
			<div>
				<div><h3>Register a New Member</h3></div><br>
				<form action="AddMembers.php" method="post">
					<table class="table table-bordered">
						<tr>
							<td>Enter Name: </td>
							<td><input type="text" name="member_id" hidden>
								<input type="text" name="member_name"></td>
							</tr>
							<tr>
								<td>Enter Course: </td>
								<td><input type="text" name="member_course"></td>
							</tr>
							<tr>
								<td>Enter Mobile: </td>
								<td><input type="text" name="member_phone"></td>
							</tr>
							<tr>
								<td>Enter Admission Year: </td>
								<td><input type="text" name="admis_year"></td>
							</tr>
							<tr>
								<td><input type="submit" value="Add Member"></td>
								<td></td>
							</tr>
						</table>
					</form>
				</div>
				<?php }	?>
				<?php if (isset($_POST['searchMemberById'])) { ?>
				<div>
					<div><h3>Edit Details</h3></div><br>
					<?php
						include 'config.php';
						$Sql = "SELECT * FROM members WHERE member_id = $_POST[member_id]";
						//echo $Sql;
						$query = mysqli_query($conn, $Sql);
					while ($row = mysqli_fetch_assoc($query)) { ?>
					
					
					<form action="editMember.php" method="post">
						<table class="table table-bordered">
							<tr>
								<td>Enter Name: </td>
								<td>
									<input type="text" value="<?php echo $row['member_id']; ?>" name="member_id" hidden>
									<input type="text" value="<?php echo $row['member_name']; ?>" name="member_name"></td>
								</tr>
								<tr>
									<td>Enter Course: </td>
									<td><input type="text" name="member_course" value="<?php echo $row['member_course']; ?>"></td>
								</tr>
								<tr>
									<td>Enter Mobile: </td>
									<td><input type="text" name="member_phone" value="<?php echo $row['member_phone']; ?>"></td>
								</tr>
								<tr>
									<td>Enter Admission Year: </td>
									<td><input type="text" name="admis_year" value="<?php echo $row['admis_year']; ?>"></td>
								</tr>
								<tr>
									<td><input type="submit" value="Edit Member"></td>
									<td></td>
								</tr>
							</table>
						</form>
						<?php } ?>
					</div>
					<?php } ?>

					<?php if (isset($_POST['edit_member'])) { ?>
					<form class="center" action="" method="post">
						<input type="text" name="member_id" placeholder="Enter Member Id" required>
						<input type="submit" name="searchMemberById" value="Search">
					</form>
					<br>
					<?php } ?>
				</div>
			</div>
			<div class="footer">
				Desined and Managed By ThanksVikasWeb
			</div>
			
		</body>
	</html>