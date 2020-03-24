<html>
	<head>
		<meta charset="utf-8">
		<title>Register</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	     <link href="css/style1.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="register">
			<h1>Register</h1>
			<form action="" method="post" autocomplete="off">
				<label for="username">
					<i class="fas fa-user"></i>
				</label>
				<input type="text" name="username" placeholder="Username" id="username" required>
				<label for="password">
					<i class="fas fa-lock"></i>
				</label>
				<input type="password" name="password" placeholder="Password" id="password" required>
				<label for="email">
					<i class="fas fa-envelope"></i>
				</label>
				<input type="email" name="email" placeholder="Email" id="email" required>
				<label for="phone">
					<i class="fa fa-phone"></i>
				</label>
				<input type="text" name="phone" placeholder="Phone" id="phone" required>
				<input type="submit" value="Register" name="OK">
				<div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 
                              </div>
                           </div>
				<p class="card-text"> 
				Already have an account? <a href="login.php">Login here</a>.
				</p>
				<br>
				</div>
				<?php 
				if(ISSET($_POST['OK']))
				{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				include ("config.php");
				$res=mysqli_query($c,"INSERT INTO accounts VALUES(NULL,'$username','$password','$email','$phone')");
                mysqli_close($c);
				header("location:login.php");
				}
				?>
			</form>
		</div>
	</body>
</html>



