<!DOCTYPE html>
<html>
<head>

	<title>Form Smaple</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="Asserts/bootstrap/css/bootstrap.css">
  <script src="Asserts/bootstrap/jquery/jquery.min.js"></script>
  <script src="Asserts/bootstrap/js/bootstrap.min.js"></script>

	<style type="text/css" media="screen">
		.text-red{
			color: red;
		}
	</style>
</head>
<body>

	<?php

	include 'connection.php';
	session_start();

	if(isset($_SESSION["isLoggedIn"])){
		header('Location: login.php');
	}


	?>


	<link rel="stylesheet" type="text/css" href="Asserts/bootstrap/css/bootstrap.css">
	<script href="Asserts/bootstrap/js/bootstrap.min.js"></script>
	<script href="Asserts/bootstrap/jquery/jquery.min.js"></script>
<body>

	<nav class="navbar navbar-default">
		<div class="container">
			<div class="container-fluid">
				<div class="navbar-header">
					
				</div>
				<ul class="nav navbar-nav pull-right">
					<li><a href="hire.php">about us</a></li>
					<li><a href="register.php">Register</a></li>
					<li class="active"><a href="login.php">login</a></li>
					
				</ul>
			</div>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<caption>Coustomer List</caption>
					<thead>
						<tr>
							<th>First Name</th>
							<th>Last Name</th>
							<th>Actions</th>

						</tr>
					</thead>
					<tbody>

					<?php


					$sql = "SELECT id, first_name, last_name FROM coustomers";
					$coustomer_list = $connection->query($sql);


						if ($coustomer_list->num_rows > 0) {
							while ($row = $student_list->fetch_assoc()) {
								echo "<tr>
									<td>".$row["id"]."</td>
									<td>".$row["first_name"]."</td>
									<td>".$row["last_name"]."</td>
									<td>".$row["email"]."</td>
								</tr>";
							}

							
							/*
							foreach ($coustomer_list as $row) {
								echo "<tr>
									<td>".$row["id"]."</td>
									<td>".$row["first_name"]."</td>
									<td>".$row["last_name"]."</td>
									<td>
									<a href='edit.php?id=".$row["id"]."'>Edit</a> | 
									<a href='delete.php?id=".$row["id"]."'>Delete</a>
									</td>

								</tr>";
							}*/
						}
					?>

						
					</body>
				</table>
			</div>
		</div>
		
	</div>
</body>
</html>



