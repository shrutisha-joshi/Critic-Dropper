<?php

// initializing variables
$name = "";
$email    = "";
$message=""; 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'contact queries');

if (isset($_POST['contactus'])) {
  // receive all input values from the form
  $name = $_POST['name'];
  $email =$_POST['email'];
  $message =$_POST['message'];
}
else echo "Error";
$query = "INSERT INTO contactus VALUES('".$name."', '".$email."', '".$message."')";
mysqli_query($db, $query);
header('location:critic dropper.php')
?>

