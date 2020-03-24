<?php
session_start();
if(ISSET($_SESSION['id']))
{
	$id=$_SESSION['id'];
$x=$_GET['x'];
include "config.php";
$res=mysqli_query($c,"delete from posts where id='$x'");
$res1=mysqli_query($c,"delete from comments where id_post='$x'");

header("location:profile.php");
}
else  
{ 
header("location:login.php");
}
?>