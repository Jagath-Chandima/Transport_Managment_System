<html>
<head><title>bbbbbb</title>
<style>

body {
    background-image: url("image/4.jpg");
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

<?php

    include 'connection.php';
    session_start();

    if(isset($_SESSION["isLoggedIn"])){
        header('Location: hire.php');
    } 
    ?>

 <?php
$email=$password="";
$error_password="";
if($_POST){

  $email=$_POST["email"];
  $password=$_POST["password"];

$sql="SELECT id,first_name,last_name,email FROM coustomers WHERE email='".$email."' and password='".md5($password)."' ";

$coustomers= $connection->query($sql);

if($coustomers->num_rows==1){
  while ($row= $coustomers->fetch_assoc()) {
    $_SESSION["isLoggedIn"]=true;
    $_SESSION["LoggedUserFirstName"]=$row['first_name'];
    $_SESSION["LoggedUserLastName"]=$row['last_name'];
    $_SESSION["LoggedUserId"]=$row['id'];
    header('location: hire.php');
  }
}else{
  $error_password="Invalid Email or Password";
}

}
?>


<body>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
<ul>
	<li><label for=""> Email </label></li>
	<input type="email" name="email"/>
	<li><label for=""> Password </label></li>
	<input type="password" name="password"/>
	<li><span><?php echo $error_password;?><span/></li>
	<input type="submit" name="login"/>

</ul>
</form>
</body>
</html>