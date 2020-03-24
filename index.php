<html>
<head>
		<meta charset="utf-8">
		<title>Home</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="css/upload.css" rel="stylesheet">
  
</head>
<?php
session_start();
if(ISSET($_SESSION['id']))
{
	$id=$_SESSION['id'];

echo "<body>

  
 <nav class='mb-4 navbar navbar-expand-lg navbar-dark bg-primary  fixed-top cyan'>
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
            </nav> ";
			
}

else {

echo "<body>

  
 <nav class='mb-4 navbar navbar-expand-lg navbar-dark bg-primary  fixed-top cyan'>
                <a class='navbar-brand font-bold' href='index.php'><img class='card-img-top' src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Logo_TV_2015.svg/1200px-Logo_TV_2015.svg.png' alt=''  style='height: 2rem; width :5rem;'></a>	
                <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent-4' aria-controls='navbarSupportedContent-4' aria-expanded='false' aria-label='Toggle navigation'>
                    <span class='navbar-toggler-icon'></span>
                </button>
                <div class='collapse navbar-collapse' id='navbarSupportedContent-4'>
                    <ul class='navbar-nav ml-auto'>
                        <li class='nav-item '>
					
                            <a class='nav-link' href='upload.php'><i class='fa fa-envelope'></i> Create Post </a>
                        </li>
                        
                        <li class='nav-item '>
                            <a class='nav-link' href='login.php' aria-expanded='false'><i class='fa fa-user'></i> Login </a>
                      
                        </li>
                    </ul>
                </div>
            </nav> ";

}	
			






include 'config.php';
$res1=mysqli_query($c,"select * from posts ORDER BY RAND()
LIMIT 1");
$l1=mysqli_fetch_array($res1);
  
echo"  <div class='container'>

    <div class='row'>
<div class='col-lg-1'>
              
      </div>
      
      

      <div class='col-lg-10'>
<br>

        <div id='carouselExampleIndicators' class='carousel slide my-4' data-ride='carousel'>
          <ol class='carousel-indicators'>
            <li data-target='#carouselExampleIndicators' data-slide-to='0' class='active'></li>
            <li data-target='#carouselExampleIndicators' data-slide-to='1'></li>
            <li data-target='#carouselExampleIndicators' data-slide-to='2'></li>
          </ol>
          <div class='carousel-inner' role='listbox'>
            <div class='carousel-item active'>
			
             <a href='post.php?x=$l1[0]'> <img class='d-block img-fluid'  src='$l1[4]' alt='First slide' style='height: 20rem; width :58rem;'></a>
            </div>";
			$res12=mysqli_query($c,"select * from posts ORDER BY RAND()
			LIMIT 1");
			$l12=mysqli_fetch_array($res12);
			
          echo"  <div class='carousel-item'>
             <a href='post.php?x=$l12[0]'>  <img class='d-block img-fluid' src='$l12[4]' alt='Second slide' style='height: 20rem; width :58rem;'></a>
            </div>";
			
			$res123=mysqli_query($c,"select * from posts ORDER BY RAND()
			LIMIT 1");
			$l123=mysqli_fetch_array($res123);
			
          
			
            echo"<div class='carousel-item'>
           <a href='post.php?x=$l123[0]'>    <img class='d-block img-fluid' src='$l123[4]' alt='Third slide' style='height: 20rem; width :58rem;'></a>
            </div>
          </div>
          <a class='carousel-control-prev' href='#carouselExampleIndicators' role='button' data-slide='prev'>
            <span class='carousel-control-prev-icon' aria-hidden='true'></span>
            <span class='sr-only'>Previous</span>
          </a>
          <a class='carousel-control-next' href='#carouselExampleIndicators' role='button' data-slide='next'>
            <span class='carousel-control-next-icon' aria-hidden='true'></span>
            <span class='sr-only'>Next</span>
          </a>
        </div>

        <div class='row'>";
$res=mysqli_query($c,"select * from posts");
while($l=mysqli_fetch_array($res))
{

   echo " <div class='col-lg-4 col-md-6 mb-4'>
            <div class='card h-100 '  '>
              <a href='post.php?x=$l[0]' ><img class='card-img-top' src='$l[4]' alt=''style='height: 13rem;' ></a>
              <div class='card-body'>
                <h4 class='card-title'>
                  <a href='#'>".$l['title']."</a>
                </h4>
                <h5>".$l['price']." $</h5>
                <p class='card-text'>".$l['description']."</p>
              </div>
              <div class='card-footer'>";
	$ress=mysqli_query($c,"SELECT * FROM accounts WHERE id='$l[1]'");		 
	$ll=mysqli_fetch_array($ress);
    
           echo  "<p>posted by <a href='profile.php?x=$l[1]'> ".$ll['username']."</a></p>
		   
              </div>
            </div>
          </div>";

}  
       

 echo "       </div>
       

      </div>
      
<div class='col-lg-1'>

        

      </div>
    </div>
	

  </div>


 
  <footer class='py-5 bg-primary'>
    <div class='container'>
      <p class='m-0 text-center text-white'>Copyright &copy; Your Website 2019</p>
    </div>
   
  </footer>
  <script src='vendor/jquery/jquery.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>
  
 "; 

mysqli_close($c);




?>


</body>
</html>


