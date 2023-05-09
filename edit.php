'''<?php

	include 'connection.php';

	?>

<?php


$first_name = $last_name = "";

if ($_POST) {

	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];

	$cou_id = $_POST["id"];



	// After form submit
	$sql = "UPDATE coustomers SET first_name='$first_name',last_name='$last_name' WHERE id = $cou_id";
	echo $sql;

	$executed = $connection->query($sql);
	if ($executed === TRUE) {
		header("Location: coustomers.php");
	}else{
		echo "Failed to update coustomer.";
	}

}else{

	$cou_id = $_GET["id"];

	// On Page Load
	$sql = "SELECT first_name, last_name FROM coustomers WHERE id = $cou_id";

	$coustomer = $connection->query($sql);

	foreach ($coustomer as $value) {
		$first_name = $value["first_name"];
		$last_name = $value["last_name"];
	}
}




?>


<form action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $cou_id; ?>" method="POST" accept-charset="utf-8">


<input type="hidden" name="id" value="<?php echo $cou_id;?>">

	<div class="form-group">
		<label for="exampleInputEmail1">First Name</label>
		<span class="text-red">*</span>
		<input type="text" class="form-control" name="first_name" value="<?php echo $first_name?>" placeholder="Type first name">
	</div>

	<div class="form-group">
		<label for="exampleInputEmail1">Last Name</label>
		<span class="text-red">*</span>
		<input type="text" class="form-control" name="last_name" value="<?php echo $last_name?>" placeholder="Last Name">
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-primary pull-right" value="Update">
	</div>
</form>