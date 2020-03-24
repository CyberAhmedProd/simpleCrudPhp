<!--   
echo "
<div class='product content-wrapper'>
    <img src='$l[4]' width='500' height='500' >
    <div>
        <h1 class='name'>".$l['title']."</h1>
        <span class='price'>
            &dollar;".$l['price']."

        </span>
        
        <div class='description'>
            ".$l['description']."
        </div>
    </div>
</div>";   
-->


<html>
	<head>
		<meta charset="utf-8">
		<title>profile</title>
		<link href="css/profile.css" rel="stylesheet" >
		 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	<body>
<?php
echo" <nav class='mb-4 navbar navbar-expand-lg navbar-dark bg-primary  fixed-top cyan'>
                <a class='navbar-brand font-bold' href='index.php'><img class='card-img-top' src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Logo_TV_2015.svg/1200px-Logo_TV_2015.svg.png' alt=''  style='height: 2rem; width :5rem;'></a>
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent-4' aria-controls='navbarSupportedContent-4' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent-4'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item active'>
					
                            <a class='nav-link' href='upload.php'><i class='fa fa-envelope'></i> Create Post </a>
                        </li>
                        
                        <li class='nav-item dropdown active'>
                            <a class='nav-link dropdown-toggle' id='navbarDropdownMenuLink-4' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fa fa-user'></i> Profile </a>
                            <div class='dropdown-menu dropdown-menu-right dropdown-cyan' aria-labelledby='navbarDropdownMenuLink-4'>
                                <a class='dropdown-item' href='profile.php'>My account</a>
                                <a class='dropdown-item' href='logout.php'>Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>";
session_start();
include 'config.php';

$id=$_SESSION['id'];



if(ISSET($_SESSION['id']))
{

 

if(!(ISSET($_GET['x'])))
 {
$x=$_GET['x'];	
$res22=mysqli_query($c,"SELECT * FROM posts WHERE id_user = '$id'");
$res222=mysqli_query($c,"SELECT * FROM accounts WHERE id = '$id'");
	
$l222=mysqli_fetch_array($res222);
 	
	
	
echo "
 <div class='container'>

    <div class='row'>

     

      <div class='col-lg-12'>

        <div >
          <br>
          <div class='card-body'>
            
			
			<div class='card1'>
			  <img src='https://img.pngio.com/avatar-icon-of-flat-style-available-in-svg-png-eps-ai-icon-png-avatar-256_256.png' alt='John' style='width:60%'>
			  
			  <h6>Email</h6>
			  <p class='title'>".$l222['email']."</p>
			  <h6>Phone</h6>
			  <p>".$l222['phone']."</p>
			  
			  
			</div>
			
			
          </div>
        </div>
       <div class='card card-outline-secondary my-4'>
          <div class='card-header'>
             <center> My posts
          </div>
          <div class='card-body'>";
	
	
	echo"  <div class='container'>



        <div class='row'>";

while($l22=mysqli_fetch_array($res22))
{

   echo " <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card h-100' >
              <a href='post.php?x=$l22[0]'><img class='card-img-top' src='$l22[4]' alt='' style='height: 13rem;'></a>
              <div class='card-body'>
                <h4 class='card-title'>
                  <a href='#'>".$l22['title']."</a>
                </h4>
                <h5>".$l22['price']." $</h5>
                <p class='card-text'>".$l22['description']."</p>
              </div>
              <div class='card-footer'>";
	
        echo  "<a href='delete.php?x=$l22[0]'><button class='btn btn-primary btn-sm'> delete</button></a>
				 
		   
              </div>
            </div>
          </div>
		  ";

}  
	
	
	




echo"	

<br>
<br>
<br>
<br>
<br>
<br>	</div>
        </div>
		</div>
        </div>
       

      </div>
    

    </div>
					
  </div>

  <footer class='py-5 bg-primary'>
    <div class='container'>
      <p class='m-0 text-center text-white'>Copyright &copy; Your Website 2019</p>
    </div>
	<script src='vendor/jquery/jquery.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

  </footer>
";






}
else
{
$x=$_GET['x'];	
$res22=mysqli_query($c,"SELECT * FROM posts WHERE id_user = '$x'");
$res222=mysqli_query($c,"SELECT * FROM accounts WHERE id = '$x'");
	
$l222=mysqli_fetch_array($res222);
 	
	
	
echo "
 <div class='container'>

    <div class='row'>

     

      <div class='col-lg-12'>

        <div >
          <br>
          <div class='card-body'>
            
			
			<div class='card1'>
			  <img src='https://img.pngio.com/avatar-icon-of-flat-style-available-in-svg-png-eps-ai-icon-png-avatar-256_256.png' alt='John' style='width:60%'>
			  
			  <h6>Email</h6>
			  <p class='title'>".$l222['email']."</p>
			  <h6>Phone</h6>
			  <p>".$l222['phone']."</p>
			  
			  
			</div>
			
			
          </div>
        </div>
       <div class='card card-outline-secondary my-4'>
          <div class='card-header'>
             <center> My posts
          </div>
          <div class='card-body'>";
	
	
	echo"  <div class='container'>



        <div class='row'>";

while($l22=mysqli_fetch_array($res22))
{

   echo " <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card h-100' >
              <a href='post.php?x=$l22[0]'><img class='card-img-top' src='$l22[4]' alt='' style='height: 13rem;'></a>
              <div class='card-body'>
                <h4 class='card-title'>
                  <a href='#'>".$l22['title']."</a>
                </h4>
                <h5>".$l22['price']." $</h5>
                <p class='card-text'>".$l22['description']."</p>
              </div>
              <div class='card-footer'>";
	
    
           echo  "
				 
		   
              </div>
            </div>
          </div>
		  ";

}  
	
	
	




echo"	

<br>
<br>
<br>
<br>
<br>
<br>	</div>
        </div>
		</div>
        </div>
       

      </div>
    

    </div>
					
  </div>

  <footer class='py-5 bg-primary'>
    <div class='container'>
      <p class='m-0 text-center text-white'>Copyright &copy; Your Website 2019</p>
    </div>
	<script src='vendor/jquery/jquery.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

  </footer>
";




}

}
else  
{ 
header('location:login.php');
}


?>
</body>
</html>
