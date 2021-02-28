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

$Sql = "INSERT INTO members VALUES('','$_POST[member_name]', '$_POST[member_course]', '$_POST[member_phone]', '$_POST[admis_year]')";

// echo $Sql;
$query_run = mysqli_query($conn,$Sql);
// if ($query_run) {
// 	echo "Data inserted";
// }
?>

<script type="text/javascript">
	alert("Member added successfully.");
	window.location.href = "members.php";
</script>