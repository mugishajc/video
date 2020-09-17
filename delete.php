<?php
@session_start();
if($_SESSION['login']!=true){
	header("Location:logout.php");
	return;
}
?>
<body bgcolor="black">
<?php
$con =mysqli_connect("localhost","root","","video");
if(@$_GET['id'])
{
mysqli_query($con,"DELETE FROM `video` WHERE `id`='".$_GET['id']."'")or die(mysqli_error());
echo"<font color='green'><b> video deleted!!</b></font>";
?>
<a href="upload.php?userid=<?php  echo @$_GET['userid']; ?>">back</a>
<?php
}
?>
</body>