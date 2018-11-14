<?php
session_start();

// initializing variables
$reviews = "";
 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'reviews');


if (isset($_POST['reviews'])) {
  // receive all input values from the form
  $reviews =$_POST['reviews'];
  $id=$_POST['idinput'];
  $user=$_SESSION['username'];
}
$query="INSERT INTO reviews(id,reviews,user) VALUES (".$id.",'".$reviews."','".$user."')";
if(!mysqli_query($db,$query))
{
	echo mysqli_error($db);
}

header('location:moviereviewpage.php')
?>