<html>
 <title>hire now</title>
 <head>
 </head>
 <body>
      <link rel="stylesheet" type="text/css" href="Asserts/bootstrap/css/bootstrap.css">
</body>

	<?php

	include 'connection.php';
	session_start();

	if(!isset($_SESSION["isLoggedIn"])){
		header('Location: login.php');
	}


	?>
<body>
<style>
body {
    background-image: url("image/10.jpg");
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
<section class="intro">

<div class="logo"><img src="..image/images (15).jpg"></div>



	
	<div class="form_register">
	<h2 style="color:white;">Hire now</h2>
	</div>

      <div class="newsection">

        <form action="" method="post" name="updateform">
		
		  <input type="text" name="User_Name" class="newform" placeholder=" Name " required></br>  
		
		  <input type="text" name="User_phonenum" class="newform" placeholder="Contact Number " required></br>

          <input type="date" name="hire date" class="newform" placeholder="hire Date " required></br> 
       
          <input type="text" name="Pick_up" class="newform" placeholder="Pick Up Address" required></br>
		  
		  <input type="text" name="Drop_address" class="newform" placeholder="Drop Address" required></br>
		  
		  <input type="text" name="Vehicle_type" class="newform" placeholder="Vehicle Type" required></br>

		  <input type="submit" name="ok" value="Register" class="you can hire now"/>ss
		  <a href="logout.php" class="white" style="color:white;">
        <span class="glyphicon glyphicon-log-out" style="margin-top: 25px;"></span> Log Out</a>
		
		
	</form>
	</div>
	</section>
</body>
</html>