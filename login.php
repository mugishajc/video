
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/jpg" href="images/play.jpg" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>online video streaming</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="main.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<!-- start header -->
<div id="wrapper">
<div id="header">
	<div id="logo">
		<h1><a href="#">videostreaming</a></h1>
	</div>
	<div id="youtube"></div>
	<div id="search">
<?php include("searchform.php"); ?>
</div>
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<?php include("menu.php");?>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
<!-- start ads -->
	<div id="ads"><a href="#"><img src="images/mtn.gif" alt="" width="160" height="600" /></a></div>
	<!-- end ads -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<div class="title">
			<div id="message">
				<h2><a href="#">sign in here!</a></h2>
<form method="post" action="login.php">
<table border="0">
 
<tr><td>username: </td><td><input type="text" name="username" required /></td></tr>
 
<tr><td>Password: </td><td><input type="password" name="password" required /></td></tr>
<tr><td></td><td><input type="submit" value="login" name="login" /></td></tr>
 
</table>
</form>
<?php
$con =mysqli_connect("localhost","root","","video");
if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
$query=mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$username' AND `password`='$password'");
$count=mysqli_num_rows($query);
if($count==1)
{
//testing if account is blocked!!
while($acc=mysqli_fetch_array($query))
{
$block=$acc['block'];
}
if($block=='yes')
{
echo"your account has been blocked!!";
die();
}
session_start();
$_SESSION['login']=true;
header('location:profile.php?username='.$username.'');
return;
}
else
{
echo"username or password incorrect!!";
}
}
?>
    </div>
              <div id="d1"></div>
          
            	</div>
		</div>
	</div>
	</div>
<div id="footer">
	<?php
	include("footer.php");
	?>
</div>
</div>
<!-- end footer -->
</body>
</html>

