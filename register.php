<!DOCTYPE html>
<html>
<head>

	<title>Create an Account</title>

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
	<body>
<style>

body {
    background-image: url("image/3.jpg");
    height:100vh;
  width:100px;
  background-repeat:no-repeat;
  position:fixed;
  height:10vh;
  background-size:cover;
  margin:auto;
  z-index:-8;}
}

</style>

</head>
<body>
     <?php

    include 'connection.php';
    session_start();

    if(isset($_SESSION["isLoggedIn"])){
        header('Location: my_profile.php');
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
					<li><a href="hire.php">hire with out register</a></li>
					<li class="active"><a href="register.php">Register</a></li>
					<li><a href="login.php">login</a></li>
					
				</ul>
			</div>
		</div>
	</nav>

<div class="container">

		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<?php

				// Fill Data
				$fname = $lname = $email = $password = $conf_password = "";

				// Fill Error Messages
				$error_fname = $error_lname = $error_email = $error_password = $error_conf_password = "";

				$formIsValid = true;

				// Check is poost method
				if ($_POST) {

					$fname = $_POST["first_name"];
					$lname = $_POST["last_name"];
					$email = $_POST["email"];
					$password = $_POST["password"];
					$conf_password = $_POST["conf_password"];

					// check first name is reuired
					if (empty($fname)) {
						$error_fname = "First name is required";
						$formIsValid = false;
					}

					// check last name is reuired
					if (empty($lname)) {
						$error_lname = "Last name is required";
						$formIsValid = false;
						
					}

					// check email required
					if (empty($email)) {
						$error_email = "Email is required";
						$formIsValid = false;
						
					}else{

						// Check email valid or not
						if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$error_email = "Invalid email format"; 
							$formIsValid = false;
							
						}
					}

					// Validate Password
					if (empty($password)) {
						$error_password = "Password is required";
						$formIsValid = false;
						
					}else{
						if (strlen($password) < 6) {
							$error_password = "Password need at least 6 characters";
							$formIsValid = false;
							
						}else{
							// Uppercase characters
							$has_uppercase = preg_match("@[A-Z]@", $password);
							// Lower Case
							$has_lowercase = preg_match("@[a-z]@", $password);
							// Number
							$has_number = preg_match("@[0-9]@", $password);

							if (!$has_uppercase || !$has_lowercase || !$has_number) {
								$error_password = "Invalid format";
								$formIsValid = false;
								
							}
						}
					}

					// Validate Confirm Password
					if (empty($conf_password)) {
						$error_conf_password = "Confirm Password is required";
						$formIsValid = false;
						
					}else{
					// Check confirm password is match with password
						if ($conf_password != $password) {
							$error_conf_password = "Confirm Password should match to password";
							$formIsValid = false;
							
						}
					}

					if ($formIsValid) {
						// Save data in database
						$sql = "INSERT INTO coustomers (`first_name`, `last_name`, `email`, `password`) VALUES ('".$fname."','".$lname."','".$email."','".md5($password)."')";

									$executed =  $connection->query($sql);

						if ($executed === TRUE) {
							$last_id = $connection -> insert_id;
							echo "Your registeration is successfully Completed.      ";
							echo "Now you can login and enjoy your self...."; 
						}else{
							echo "Failed to register Student <br>" . $connection->error;
						}
					}

				}

				?>	

				<legend>Create an Account</legend>
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					<div class="form-group">
						<label for="exampleInputEmail1">First Name</label>
						<span class="text-red">*</span>
						<input type="text" class="form-control" name="first_name" value="<?php echo $fname; ?>" placeholder="Type first name">
						<span class="text-red"><?php echo $error_fname; ?></span>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Last Name</label>
						<span class="text-red">*</span>
						<input type="text" class="form-control" name="last_name" value="<?php echo $lname; ?>" placeholder="Last Name">
						<span class="text-red"><?php echo $error_lname; ?></span>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Email</label>
						<span class="text-red">*</span>
						<input type="text" class="form-control" name="email" value="<?php echo $email; ?>" placeholder="Email">
						<span class="text-red"><?php echo $error_email; ?></span>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Password</label>
						<span class="text-red">*</span>
						<input type="password" class="form-control" name="password"  placeholder="Password Ex- Abcd123">
						<span class="text-red"><?php echo $error_password; ?></span>
					</div>

					<div class="form-group">
						<label for="exampleInputEmail1">Confirm Password</label>
						<span class="text-red">*</span>
						<input type="password" class="form-control" name="conf_password"  placeholder="Confirm Password">
						<span class="text-red"><?php echo $error_conf_password; ?></span>
					</div>


					<div class="form-group">
						<input type="submit" class="btn btn-primary pull-right" value="Submit Data" href="hierok.php">
						   
					</div>
				</form>
			</div>
		</div>

	</div>
	
</body>
</html>