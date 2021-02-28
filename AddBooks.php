<?php 

// $book_id = $_POST['book_id'];
// $book_name = $_POST['book_name'];
// $book_code = $_POST['book_code'];
// $book_price = $_POST['book_price'];
// $book_isbn = $_POST['book_isbn'];
// $author_name = $_POST['author_name'];
// $book_edition = $_POST['book_edition'];
// $launch_year = $_POST['launch_year'];

//echo $book_name;


include 'config.php';

$Sql = "INSERT INTO books VALUES('', '$_POST[book_name]', '$_POST[book_code]', '$_POST[book_price]', '$_POST[book_isbn]', '$_POST[author_name]', $_POST[book_edition], '$_POST[launch_year]')";

// echo $Sql;
$query_run = mysqli_query($conn,$Sql);
// if ($query_run) {
// 	echo "Data inserted";
// }
?>

<script type="text/javascript">
	alert("Book added successfully.");
	window.location.href = "books.php";
</script>