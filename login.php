<?php 
include('server.php');
 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  
</head>
<body>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="movie.js" type="text/javascript"></script>
<title> Movie review and Trailors</title>
<style>
* {
  margin: 0px;
  padding: 0px;
}
body {
  font-size: 120%;
  background: #F8F8FF;
}

.header {
  width: 30%;
  margin: 50px auto 0px;
  color: white;
  background: #5F9EA0;
  text-align: center;
  border: 1px solid #B0C4DE;
  border-bottom: none;
  border-radius: 10px 10px 0px 0px;
  padding: 20px;
}
.new, .content {
  width: 30%;
  margin: 0px auto;
  padding: 20px;
  border: 1px solid #B0C4DE;
  background:white;
  border-radius: 0px 0px 10px 10px;
}
.input-group {
  margin: 10px 0px 10px 0px;
}
.input-group label {
  display: block;
  text-align: left;
  margin: 3px;
}
.input-group input {
  height: 30px;
  width: 93%;
  padding: 5px 10px;
  font-size: 16px;
  border-radius: 5px;
  border: 1px solid gray;
}
.btn {
  padding: 10px;
  font-size: 15px;
  color: white;
  background: #5F9EA0;
  border: none;
  border-radius: 5px;
}
.error {
  width: 92%; 
  margin: 0px auto; 
  padding: 10px; 
  border: 1px solid #a94442; 
  color: #a94442; 
  background: #f2dede; 
  border-radius: 5px; 
  text-align: left;
}
.success {
  color: #3c763d; 
  background: #dff0d8; 
  border: 1px solid #3c763d;
  margin-bottom: 20px;
}
body {
  margxin: 0; 
}

.topheader{
height:30px;
margin-left:20px;
margin-right:20px;
padding:10px;
width:auto;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
	height:50px;
	padding-bottom:14px;
	text-align:center;
	
}

li {
    float: left;
}

li a {
    display: block;
	height:70px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
	margin:1px;
	font-weight:bold;
	font-family:"Calibri";
}

li a:hover{
    background-color:white;
	text-decoration:none;
	color:#0080ff;

}
.poster{
  width: 188px;
  margin: 0;
}
.mepo{
  padding: 5px;
  position: absolute;
  top:0;
  left:0;
  background-color: #8B0000;
  color: white;
  font-weight: bold;
}
.rating{
  position:absolute;
  display: inline-flex;
    width:40px;
    height:30px;
    bottom: 1;
    right: 2;
    color:white;
    background-color: #000000; 
    opacity: 0.5%;
}
.icon-star2{
  background-image: url(/images/star.jpg);
  width: 5px;
  height: 5px;
}

.image{
position:relative;}

.col-sm-2{
  padding: 0px 10px 0px 10px;
}


.image {
  display: block;
  width: 100%;
  height: auto;
}

.overlay {
  position: absolute;
  top: 5px;
  bottom: 0;
  left: 10px;
  right: 0;
  height: 77%;
  width: 86%;
  opacity: 0;
  transition: .3s ease;
  background-color: black;
  margin: 0px 6px 5px 4px;
  cursor:pointer;
}

.icon {
  color: white;
  height: 20%;
  width: 28%;
  position: absolute;
  top: 40%;
  left: 50%;
  -ms-transform: scale(0.5,0.5); /* IE 9 */
  -webkit-transform: scale(0.5,0.5); /* Safari */
  transform: scale(0.5,0.5);
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
  opacity: 0;
  cursor: pointer;
}

.hover-container:hover  .overlay{
  opacity: 0.5;
}
.hover-container:hover  .icon{
  opacity: 1;
}

</style>
</head>
<body style="background-color:#DCDCDC; ">
<div id="header-top" style="display:inline-flex; background-color: #333;width:100%;height:11%; position:sticky;">
  <div id="header" class="topheader" style="margin:5px;padding:5px;margin-top:1.5%;width:20%">
    <p style="color:white;text-align:center;font-size:20px;font-weight:bold;">CRITIC DROPPER</p>
  </div>

<div class="col-md-3">
  <form class="navbar-form" role="search" action="searchmovie.php" method="post">
    <div class="input-group add-on">
      <input class="form-control topheader"  placeholder="Search..." name="searchname" id="srch-term" type="text" style="padding-top:10px;width:93%;margin:20px;background-color:black;border-color:grey;border-right:none;color:white;height:30px;">
      <div class="input-group-btn">
        <button  class="btn btn-default" type="submit" style="height:30px;margin-top:0.2px;background-color:black;border: 1px solid grey;padding-bottom: 2px;"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
  
</div>

<div id="navbar" class="topheader" style="float:right;padding-bottom:15px;width:40%;font-size:15px;margin-top:0px;margin-bottom:0px,height:11%;">
<ul>
  <li><a class="activ"  href="critic dropper.php">Home</a></li>
  <li><a class="activ" href= "moviereviewpage.php">MovieReviews</a></li>
  <li><a class="activ"  href="contactnew.html">Contact Us</a></li>
  <li><a class="activ"  href="register.php">Register</a></li>
  <li><a class="activ" style="background-color:#40E0D0" href="login.php">Login</a></li>
  
</ul>
</div>
</div>
<br><br><br>
<h2 style="text-align:center">You must log in first</h2>
  <div class="header">
  	<h2>Login</h2>
  </div>
	 
  <form class="new" method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
  	<p>
  		Not yet a member? <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>