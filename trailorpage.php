<?php
include('server.php');
?>
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
        <button  class="btn btn-default" type="submit" style="height:30px;margin-top:0.2px;background-color:black;border-color:grey;"><i class="glyphicon glyphicon-search"></i></button>
      </div>
    </div>
  </form>
  
</div>

<div id="navbar" class="topheader" style="float:right;padding-bottom:15px;width:40%;font-size:15px;margin-top:0px;margin-bottom:0px,height:11%;">
<ul>
  <li><a class="activ"  href="critic dropper.php">Home</a></li>
  <li><a class="activ" href= "moviereviewpage.php">MovieReviews</a></li>
  <li><a class="activ"  href="contactnew.html">Contact Us</a></li>
  <li><a class="activ" href="register.php">Register</a></li>
  <li><a class="activ"  href="login.php">Login</a></li>
  
 
</ul>
</div>
</div>
<br><br><br>


  <?php
  
$id=$_POST['id'];
$servername = "127.0.0.1";
$username = "root";
$password = "";
$db = "moviereview";
$db2="reviews";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql="SELECT * FROM moviereview WHERE id='".$id."'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$count=mysqli_num_rows($result);

$row=mysqli_fetch_assoc($result);
  echo'
  <div id="content-wrap" style="margin-left: 60px; margin-right: 60px; background-color: white; padding-right: 20px; padding-left: 20px;">
    <div class="playex" >
                  <div id="option-1" class="play-box-iframe fixidtab" >
        <iframe class="metaframe rptss" src="'.$row['trailor_link'].'" frameborder="0" scrolling="no" allowfullscreen style="height:500px; width:800px; margin: 20px;"></iframe>
      </div>

  </div>
  <br>
  <div class="sheader" style="display:inline-flex; margin-left:10px;">
  <div class="poster" style="display: inline-flex; padding: 25px;">
    <img src="'.$row['poster_link'].'" alt="link">
  </div>

  <div class="data" style=" width:30%; float: right; margin:70px;">
    <h1>'.$row['name'].'</h1>
    <div class="extra">
      <div>
       <span class="country">'.$row["country"].'</span><br><span class="Genre">'.$row["genre"].'</span></div>
    </div>
    <div id="info" class="sbox fixidtab">
<h3>Synopsis</h3>
<div itemprop="description" class="wp-content" style=" margin:10px;width:50%;">
<p>'.$row["description"].'</p></div>
  </div>
</div>
</div>
<div>';
echo '<h4> Should I watch this movie?</h4>';
echo '<h4>Movie review rating:';
ini_set('max_execution_time', 300);
$url = "http://localhost:5000/movie_main/".$id;
$content =file_get_contents($url);
$result  = json_decode($content);
print_r($result->data);
echo '/5</h4>';

echo '<h3>Movie reviews</h3>';
$s="SELECT * FROM reviews where id=$id";
$con = new mysqli($servername, $username, $password, $db2);
$result=mysqli_query($con,$s);
if(mysqli_num_rows($result)>0)
{
	while(	$row=mysqli_fetch_assoc($result))
	{ echo "<h5><b>".$row['user']."</b></h5><h5>".$row['reviews']."<h5><hr>"; }
    
}
else {echo "error";}
echo '<h5><b>Write your reviews here!</b></h5>
<form action="reviews.php" method="post">
<input type="hidden" name="idinput" value="'.$id.'">
<textarea name="reviews" style="margin-left:20px;margin-right:20px;margin-bottom:0px;margin-top:20px;" cols="100" rows="5" placeholder="post your reviews here"></textarea>
<input type="submit" value="Post Review" style="font-weight:bold;width:10%;margin:20px" onclick=>';
}
?>
</body>
</html>