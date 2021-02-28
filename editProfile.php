<?php 

include 'config.php';

$Sql = "UPDATE admin SET admin_name = '$_POST[name]', admin_phone = '$_POST[phone]', member_post = '$_POST[post]', admin_city = '$_POST[city]' WHERE admin_id = '$_POST[aid]'";

$run = mysqli_query($conn, $Sql);

?>

<script>
	alert("Details Edited Successfully.");
	window.location.href = "userDashboard.php";

</script>