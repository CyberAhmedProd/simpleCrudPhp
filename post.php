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
		<title>Post</title>
		<link href="css/post.css" rel="stylesheet" >
		 <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
					
                            <a class='nav-link' href='upload.php'><i class='fa fa-envelope'></i> create Post </a>
                        </li>
                        
                        <li class='nav-item dropdown'>
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
if(ISSET($_SESSION['id']))
{
	$id=$_SESSION['id'];
	
$x=$_GET['x'];
include 'config.php';
  
$res=mysqli_query($c,"SELECT * FROM posts WHERE id = '$x'");
 if($l=mysqli_fetch_array($res))
{  
   

echo "

 <div class='container'>
<br>

    <div class='row'>

     

      <div class='col-sm-1'>
       </div>
	   <div class='col-sm-10'>
        <div class='card mt-4'>
          <img class='card-img-top img-fluid' src='".$l['path']."' alt='' style='height: 25rem;'>
          <div class='card-body'>
            <h3 class='card-title'>".$l['title']."</h3>
            <h4>$".$l['price']."</h4>
            <p class='card-text'>".$l['description']."</p>
            <span class='text-warning'>&#9733; &#9733; &#9733; &#9733; &#9734;</span>
            4.0 stars
          </div>
        </div>
       <div class='card card-outline-secondary my-4'>
          <div class='card-header'>
             Reviews
          </div>
          <div class='card-body'>";
		  
	$ress=mysqli_query($c,"SELECT * FROM comments WHERE id_post= '$x'");
 while($la=mysqli_fetch_array($ress))	  
 {
  $resss1=mysqli_query($c,"SELECT * FROM accounts WHERE id='$la[1]'");		
  $lo=mysqli_fetch_array($resss1);
   echo"         <p>$la[3]</p>
            <small class='text-muted'>Posted by <a href='profile.php?x=$la[1]'>".$lo['username']."</a> on ".$la['uploaded_date']."</small>
            <hr>";
 }			
			
   echo" <form  class='contact' action='' method='POST'  >
          <textarea class='form-control' name='msg' placeholder='write a comment...' required></textarea>   
          <br><input class='btn btn-primary mb-2' style='float:right; margin-right:12px;' type='submit' name='mod'>";
if(ISSET($_POST['mod']))
{

$body=$_POST['msg'];
$resss=mysqli_query($c,"INSERT INTO comments VALUES(NULL, '$id' ,'$x','$body' ,CURRENT_TIMESTAMP )");		  
 echo "<meta http-equiv='refresh' content='0'>";         
}
echo"	 </form></div>
        </div>
        <!-- /.card -->

      </div>
    <div class='col-lg-3'>
					 <div class='card mt-4'>
					 
					 </div>	
					</div>

    </div>
					
  </div>

  <!-- Footer -->
  <footer class='py-5 bg-primary'>
    <div class='container'>
      <p class='m-0 text-center text-white'>Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src='vendor/jquery/jquery.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>

";

}  
mysqli_close($c);
}
else  
{ 
header('location:login.php');
}
?>
</body>
</html>
