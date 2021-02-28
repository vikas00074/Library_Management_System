<?php include 'header.php'; ?>
<div class="row">
	<div class="col-2 left-side">
		<ul><form method="post" action="">
			<li><input type="submit" value="My Account"></li>
			<li><input type="submit" value="Manage Books" name="books_set"></li>
			<li><input type="submit" value="Manage Members" name="members"></li>
			<li><input type="submit" value="Edit My profile" name="edit_profile" id="btn"></li>
		</form>
	</ul>
	<?php if (isset($_POST['books_set'])) {
	header("Location: books.php");
	} ?>
	<?php if (isset($_POST['members'])) {
		header("Location: members.php");
	} ?>
</div>
<div class="col-8 right-side">
	<div class="box" hidden>
		<div class="jumbotron">
			<h2>Welcome Mr. <?php echo $_SESSION['name']; ?></h2>
		</div>
	</div>
	<div class="fact">
		<?php
		if (isset($_POST['edit_profile'])) {
			include 'config.php';

			$userId = $_SESSION['userId'];

			$Sql = "SELECT * FROM admin WHERE admin_id = '{$userId}'";

			echo $Sql;

			$result = mysqli_query($conn, $Sql) or die("Query Failed");

		 ?>
		<h3>Edit Details</h3>
		<form action="editProfile.php" method="post">
			<table class="table table-bordered">
				<?php 
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_assoc($result)) { ?>
							
					
				<tr>
					<td>User Id</td>
					<td><input class="text-white bg-dark" value="<?php echo $row['admin_id']; ?>" type="text" name="aid" readonly></td>
				</tr>
				<tr>
					<td><label>Enter Name</label></td>
					<td><input class="text-dark" value="<?php echo $row['admin_name']; ?>" type="text" placeholder="" name="name" required></td>
				</tr>
				<tr>
					<td><label>Enter Phone</label></td>
					<td><input class="text-dark" value="<?php echo $row['admin_phone']; ?>" type="text" placeholder="" name="phone"></td>
				</tr>
				<tr>
					<td><label>Enter Post</label></td>
					<td><input class="text-dark" value="<?php echo $row['admin_post']; ?>" type="text" placeholder="" name="post"></td>
				</tr>
				<tr>
					<td><label>Enter City</label></td>
					<td><input class="text-dark" value="<?php echo $row['admin_city']; ?>" type="text" placeholder="" name="city"></td>
				</tr>
				<tr>
					<td><input class="btn btn-info" type="submit" value="Save" name="save"></td>
					<td></td>
				</tr>
				<?php } } ?>
			</table>
		</form>
		<?php } ?>
	</div>
</div>
</div>
<?php include 'footer.php' ?>