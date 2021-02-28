<?php include 'header.php'; 

include 'config.php';
//session_start();

if (!isset($_SESSION['userId'])) {
	header("Location: index.php");
}

?>
<div class="row">
	<div class="col-2 left-side">
		<ul><form action="" method="post">
			<li><input type="submit" value="Book List" name="book_list"></li>
			<li><input type="submit" value="Add New Book" name="add_book"></li>
			<li><input type="submit" value="Edit Book" name="edit_book"></li>
			<li><input type="submit" value="Borrowed Books" name="barrawed"></li>
			</form>
		</ul>	
	</div>

	<div class="col-8 right-side">
		<div class="box">
			<div class="jumbotron" id="show">
				<h2 class="pb-1">Welcome to Books Management</h2>
				<img src="images/book1.jpg" alt="Books">
				<img src="images/book2.jpg" alt="Books">
				<img src="images/book3.jpg" alt="Books">
			</div>
		</div>

		<div class="fact">
			<script>
				$(document).ready(function () {
					$('input[name="book_list"]').click(function () {
						$('.box').hide();
					});
				});
			</script>
			<?php if (isset($_POST['book_list'])) { ?>	
					<table class="table table-bordered">
						<?php 

							include "config.php"; 

							$sql = "SELECT * FROM books";
							$query_run = mysqli_query($conn, $sql);
						?>
						<thead>
							<tr>
								<th>Book Name</th>
								<th>Book Code</th>
								<th>Book Price</th>
								<th>ISBN No</th>
								<th>Author Name</th>
								<th>Book Edition</th>
								<th>Lounch Year</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_assoc($query_run)) { ?>
							<tr>
								<td><?php echo $row['book_name']; ?></td>
								<td><?php echo $row['book_code']; ?></td>
								<td><?php echo $row['book_price']; ?></td>
								<td><?php echo $row['book_isbn']; ?></td>
								<td><?php echo $row['author_name']; ?></td>
								<?php if ($row['book_edition'] == 1){ ?>
									<td><?php echo $row['book_edition']; ?><sup>st</sup></td>
								
								<?php } elseif ($row['book_edition'] == 2) { ?>
									<td><?php echo $row['book_edition']; ?><sup>nd</sup></td>
								
								<?php } elseif ($row['book_edition'] == 3) { ?>
									<td><?php echo $row['book_edition']; ?><sup>rd</sup></td>
								<?php } else { ?>
									<td><?php echo $row['book_edition']; ?><sup>th</sup></sup></td>
								<?php } ?>
								<td><?php echo $row['launch_year']; ?></td>
							</tr>
						<?php } ?>
						</tbody>

					</table>
			<?php } ?>

			<?php if (isset($_POST['add_book'])) { ?>
				<div>
					<div><h3>Enter Book Details: </h3></div><br>
					<form action="AddBooks.php" method="post">
						<table class="table table-bordered">
							<tr>
								<td>Enter Book Name: </td>
								<td><input type="text" name="book_name">
									<input type="text" name="book_id" hidden></td>
								<td>Enter Book Code:</td>
								<td><input type="text" name="book_code"></td>
							</tr>
							<tr>
								<td>Enter Book Price:</td>
								<td><input type="text" name="book_price"></td>
								<td>Enter ISBN:</td>
								<td><input type="text" name="book_isbn"></td>
							</tr>
							<tr>
								<td>Enter Author Name:</td>
								<td><input type="text" name="author_name"></td>
								<td>Enter Book Edition:</td>
								<td><input type="number" name="book_edition"></td>
							</tr>
							<tr>
								<td>Enter Book Launch Year:</td>
								<td><input type="text" name="launch_year"></td>
							</tr>
						</table>
						<input class="btn btn-dark px-5" type="submit" value="Save">
					</form>
				</div>
			<?php } ?>

			<?php if (isset($_POST['edit_book'])) { ?>
				<form action="" method="post">
					<table>
						<tr>
							<td><input type="text" name="bookName" placeholder="Enter Book Name.." required></td>
							<td><input type="submit" name="searchBookByName"></td>
						</tr>
					</table>
				</form>
			<?php } ?>

			<?php if (isset($_POST['searchBookByName'])) { ?>
				<div>
					<div><h3>Update Book Details: </h3></div><br>
					<?php 

						include 'config.php';

						$Sql = "SELECT * FROM books WHERE book_name = '$_POST[bookName]' ";

						$query_run = mysqli_query($conn, $Sql);

						while ($row = mysqli_fetch_assoc($query_run)) { ?>
						
					<form action="editBooks.php" method="post">
						<table class="table table-bordered">
							<tr>
								<td>Enter Book Name: </td>
								<td><input type="text" name="book_id" hidden>
									<input type="text" name="book_name" value="<?php echo $row['book_name'] ?>">
								<td>Enter Book Code:</td>
								<td><input type="text" name="book_code" value="<?php echo $row['book_code'] ?>"></td>
							</tr>
							<tr>
								<td>Enter Book Price:</td>
								<td><input type="text" name="book_price" value="<?php echo $row['book_price'] ?>"></td>
								<td>Enter ISBN:</td>
								<td><input type="text" name="book_isbn" value="<?php echo $row['book_isbn'] ?>"></td>
							</tr>
							<tr>
								<td>Enter Author Name:</td>
								<td><input type="text" name="author_name" value="<?php echo $row['author_name'] ?>"></td>
								<td>Enter Book Edition:</td>
								<td><input type="number" name="book_edition" value="<?php echo $row['book_edition'] ?>"></td>
							</tr>
							<tr>
								<td>Enter Book Launch Year:</td>
								<td><input type="text" name="launch_year" value="<?php echo $row['launch_year'] ?>"></td>
							</tr>
						</table>
						<input class="btn btn-dark px-5" type="submit" value="Save">
					</form>
					<?php }
					?>
				</div>
			<?php } ?>
		</div>
	</div>	
</div>



<?php include 'footer.php' ?>