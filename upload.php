<html>
<head>
		<meta charset="utf-8">
		<title>upload post</title>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="css/upload.css" rel="stylesheet"> 
  
</head>
<?php
echo" <nav class='mb-4 navbar navbar-expand-lg navbar-dark bg-primary fixed-top cyan'>
                <a class='navbar-brand font-bold' href='index.php'><img class='card-img-top'src='https://upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Logo_TV_2015.svg/1200px-Logo_TV_2015.svg.png' alt=''  style='height: 2rem; width :5rem;'></a>
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
if(ISSET($_SESSION['id']))
{
	$id=$_SESSION['id'];
include 'config.php';
// The output message
$msg = '';
// Check if user has uploaded new image
if (isset($_FILES['image'], $_POST['title'], $_POST['description'],$_POST['price'])) {
	// The folder where the images will be stored
	$target_dir = 'image/';
	// The path of the new uploaded image
	$image_path = $target_dir . basename($_FILES['image']['name']);
	// Check to make sure the image is valid
	if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
		if (file_exists($image_path)) {
			$msg = 'Image already exists, please choose another or rename that image.';
		} else if ($_FILES['image']['size'] > 500000) {
			$msg = 'Image file size too large, please choose an image less than 500kb.';
		} else {
			// Everything checks out now we can move the uploaded image
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			// Insert image info into the database (title, description, image path, and date added)
			$title=$_POST['title'];
			$description=$_POST['description'];
			$price=$_POST['price'];
			$res=mysqli_query($c,"INSERT INTO posts VALUES (NULL,'$id','$title','$description','$image_path','$price', CURRENT_TIMESTAMP)");
	        
			$msg = 'Image uploaded successfully!';
		}
	} else {
		$msg = 'Please upload an image!';
	}
	mysqli_close($c);
header("location:index.php");
}

}
else  
{ 
header('location:login.php');
}

?>


<div class="content upload">
	<h2>Upload Image</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label for="image">Choose Image</label>
		<input type="file" name="image" accept="image/*" id="image">
		<label for="title">Title</label>
		<input type="text" name="title" id="title">
		<label for="description">Description</label>
		<textarea name="description" id="description"></textarea>
		<label for="price">Price</label>
		<input type="number" name="price" id="title">
	    <input type="submit" value="Upload Image" name="submit">
	</form>
	<p><?=$msg?></p>
</div>
 <footer class='py-5 bg-primary'>
    <div class='container'>
      <p class='m-0 text-center text-white'>Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src='vendor/jquery/jquery.min.js'></script>
  <script src='vendor/bootstrap/js/bootstrap.bundle.min.js'></script>


