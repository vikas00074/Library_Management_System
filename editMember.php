<?php 

include 'config.php';

$Sql = "UPDATE members SET member_name = '$_POST[member_name]', member_course = '$_POST[member_course]', member_phone = '$_POST[member_phone]', admis_year = '$_POST[admis_year]' WHERE member_id = '$_POST[member_id]'";

$run = mysqli_query($conn, $Sql);

?>

<script>
	alert("Details Edited Successfully.");
	window.location.href = "members.php";

</script>