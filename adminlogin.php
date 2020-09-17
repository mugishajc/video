<head>
<link rel='stylesheet' href='demo2.css' media='all' type='text/css'>
<style type='text/css' >
body{
background:url('images/admin_bg.png') no-repeat;
}
</style>
<script type="text/javascript" src='js/jquery.js'></script>
<script>
$(document).ready(function(){
$(".spand").click(function(){
$("#blur").fadeOut(1000,function(){

});
});
});
</script>
</head>
<?php
$con =mysqli_connect("localhost","root","","video");
?>
<div id="blur">
<a href="index.php"><span class='spand'>X</span></a>
<div id="lform">
<h4>Login Form</h4>
<div id="formholder">
<form method="post" action="adminlogin.php">
<?php   echo @$message;    ?>
<label>Username</label><br>
<input type="text" name="username" required placeholder="Username" class="input">
<br>
<label>Password</label><br>
<input type="password" name="password" required placeholder="Password" class="input">
<br>
<input type="submit" name="submit" value="Login" class="submit">
</form> 
</div>
<footer><span></span></footer>
</div>
</div>
<?php
$con =mysqli_connect("localhost","root","","video");
if(isset($_POST['submit']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$query=mysqli_query($con,"SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'")or die(mysqli_error());
$count=mysqli_num_rows($query);
if($count == 1)
{
session_start();
$_SESSION['adminlogin']=true;
$_SESSION['admin']=$username;
header('location:admin.php');
return;
}
else
{
$message="invalid username or password!!";
include("adminlogin.php");
}
}
?>
