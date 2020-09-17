<?php
session_start();
$con =mysqli_connect("localhost","root","","video");
$qr=mysqli_query($con,"SELECT * FROM `user` WHERE `userid`='".$_GET['userid']."'")or die(mysqli_error());
$user= mysqli_fetch_assoc($qr);
$username=$user['username'];
if($_GET['action']=='change')
{
//here are the code for change profile pics
if(isset($_POST["upload"]))
{
	if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 20000000)){
		$filename=date("ss",time()).$_FILES["file"]["name"];
		if ($_FILES["file"]["error"] > 0){
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		} else {
			if (file_exists("images/".$filename)) {
				echo $_FILES["file"]["name"] . " already exists. ";
			} else {
				move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$filename);
				//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			}
		}
	} else {
		echo "Invalid file".$_FILES["file"]["type"];
	}
	mysqli_query($con,"UPDATE `user` SET `userimg` = '".$filename."' WHERE `userid`= '".$_GET['userid']."' ");
	
}
$username=$_SESSION['username'];
header('location:profile.php?username='.$username.'');
}
if($_GET['action']=='upload')
{
if(isset($_POST["upload"]))
{
	if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 20000000))
	{    $filename=$_FILES["file"]["name"];
		if ($_FILES["file"]["error"] > 0){
			echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
		} else {
				move_uploaded_file($_FILES["file"]["tmp_name"],"images/".$filename);
				//echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
			}
		}else {
		echo "Invalid file".$_FILES["file"]["type"];
	}
	}
	mysqli_query($con,"UPDATE `user` SET `userimg` = '".$filename."' WHERE `userid`= '".$_GET['userid']."' ");
	header('location:profile.php?username='.$username.'');	
}
if($_GET['action']=='names')
{
//change names here!!
if(isset($_POST['updatenames']))
{
$qry=mysqli_query($con,"UPDATE  `video`.`user` SET  `firstname` =  '".$_POST['firstname']."',`lastname` =  '".$_POST['lastname']."' WHERE  `user`.`userid` ='".$_GET['userid']."'")or die(mysqli_error());

//check if query succeded!!
if($qry)
{
header('location:profile.php?username='.$username.'');
}
else
{
echo"error occured while trying to change your names!";
}
}
}
if($_GET['action']=='age')
{
if(isset($_POST['apply']))
{
$query=mysqli_query($con,"UPDATE `user` SET `user`.`age`='".$_POST['age']."' WHERE `userid`='".$_GET['userid']."'")or die(mysqli_error());
if($query)
{
header('location:profile.php?username='.$username.'');
}
}
}
if($_GET['action']=='email')
{
if(isset($_POST['apply']))
{
$query=mysqli_query($con,"UPDATE `user` SET `user`.`email`='".$_POST['email']."' WHERE `userid`='".$_GET['userid']."'")or die(mysqli_error());
if($query)
{
header('location:profile.php?username='.$username.'');
}
}
}

?>