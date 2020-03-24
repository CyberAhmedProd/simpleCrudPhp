<html>
<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="css/style.css" rel="stylesheet" type="text/css">
	</head>
<body>
<div class="login">
<h1>Login</h1>
<form action="" method="POST">
<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<input type="submit" value="Login" name="OK">
				  <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 
                              </div>
                           </div>
				<p class="card-text"> 
				don't have an account ? <a href="register.php">sign up here</a>.
				</p>
				<br>



<?php
if(ISSET($_POST['OK']))
{

$username=$_POST['username'];
$password=$_POST['password'];
include ("config.php");
$res=mysqli_query($c,"select * from accounts where username='$username' AND password='$password'");
if($l=mysqli_fetch_array($res))
{
session_start();
$_SESSION['id']=$l[0];	
header("location:index.php");
}
else
{ 
die ('Wrong credentials!');

}
mysqli_close($c);
}


?>

</div>
</form>
</body>
</html>