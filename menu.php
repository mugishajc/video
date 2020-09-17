<?php
$con=mysqli_connect("localhost","root","","video");
;
if($con)
{
@session_start();
if(@$_SESSION['login'])
{
?>
<ul>
     	<li><a href="profile.php?username=<?php echo $_SESSION['username'] ?>">profile</a></li>
		<li><a href="logout.php">logout</a></li>
		<li><a href="upload.php?userid=<?php echo $_SESSION['userid'] ?>">upload</a></li>
		<li><a href="contact.php">Contact</a></li>
	</ul>
<?php
}
elseif(@$_SESSION['adminlogin'])
{
?>
<ul>
     	<li><a href="admin.php">profile</a></li>
		<li><a href="adlogout.php">logout</a></li>
		<li><a href="admin.php?action=blockunblock">manage accounts</a></li>
		<li><a href="admin.php?action=viewvideos">manage videos</a></li>
	</ul>
<?php
}
else
{
?><ul>
     	<li class="current_page_item"><a href="index.php">Home</a></li>
		<li><a href="login.php">login</a></li>
		<li><a href="signup.php">sign up</a></li>
		<li><a href="most.php">most viewed</a></li>
		<li><a href="contact.php">Contact</a></li>
	</ul>
<?php
}
}
else
{
echo"not connect".mysqli_error();
}	
?>