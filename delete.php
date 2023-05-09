
	<?php

	include 'connection.php';

	?>
<?php 

	$cou_id = $_GET["id"];

	$sql = "DELETE FROM coustomers where id = $cou_id";
	$executed = $connection->query($sql);

	if ($executed === TRUE) {
		header("Location: coustomers.php");
	}else{
		echo "Failed to delete coustomer <br > ". $connection->error;;
	}

 ?>