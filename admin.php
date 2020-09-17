<?php
@session_start();
if($_SESSION['adminlogin']!=true){
	header("Location:adlogout.php");
	return;
}
?>
<!--
Design by Mucyo Fred

Released for final year project 2013

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/jpg" href="images/play.jpg" />
 <link href="video-js/video-js.css" rel="stylesheet">
    <script src="video-js/video.js"></script>
    <script>
      _V_.options.flash.swf = "video-js/video-js.swf"
    </script>
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
		<h1><a href="#">Videostreaming</a></h1>
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
			<?php
			$con =mysqli_connect("localhost","root","","video");
			@session_start();			
			$q=mysqli_query($con,"SELECT * FROM `admin` WHERE `username`='".@$_SESSION['admin']."'")or die(mysqli_error());
			if($q)
			{
			echo"<nav id='adminprofile'>";
			while($arr=mysqli_fetch_array($q))
			{
			?>
			<img src="images/<?php echo $arr['img']; ?>" height="200"  width="200">
			<br>
			<a href="admin.php?action=changepic">change picture here!</a>
			<?php
			
			echo"<br/><a>admin username:".$arr['username']."</a>";
			echo"<br/>";
			echo"<a>admin id:".$arr['id']."<br/></a>";
			echo"<a href='admin.php?action=changepass'>change password here!</a><br/>";
			echo"<a href='admin.php?action=blockunblock'>manage accounts here!</a><br/>";
			echo"<a href='admin.php?action=viewvideos'>view & manage uploaded videos here!</a>";
			echo"</nav>";
			}
			}
			?>
		</div>
		<div id="adminpro">
              <div id="d1"></div>
          <?php 

       if(@$_GET['action']=='changepass')
		{
         ?>
		 <form method="post" action="">
		 <table id="changepass">
		 <tr>
		 <td>
		 old password:</td><td><input type="password" name="oldpass"><br>
		 </td>
		 </tr>
		 <tr>
		 <td>
		 new password:</td><td><input type="password" name="pass"><br>
		 </td>
		 </tr>
		 <tr>
		 <td>
		 confirm password:</td><td><input type="password" name="cpass"><br>
		 </td>
		 </tr>
		 <tr>
		 <td>
		 <input type="submit" name="change" value="change">
		 </td>
		 </tr>
		 </table>
		 </form>
		 <?php
		 if(isset($_POST['change']))
		 {
		 $oldpass=$_POST['oldpass'];
		 $pass=$_POST['pass'];
		 $cpass=$_POST['cpass'];
		 if($pass != $cpass)
		 {
		 echo"<div id='msgbox'>";
         echo"password doesn't match";
		 echo"</div>";
		 }
		 else
		 {
		 $q=mysqli_query($con,"SELECT `password` FROM `admin` WHERE `password`='$oldpass' AND `username`='".@$_SESSION['admin']."'")or die(mysqli_error());
		 $count=mysqli_num_rows($q);
		 if($count ==1)
		 {
		 $up=mysqli_query($con,"UPDATE `admin` SET `password`='$pass' WHERE `username`='".@$_SESSION['admin']."'")or die(mysqli_error());
		 if($up)
		 {
         echo"<div id='msgbox'>";
         echo"password changed successfull!";
		 echo"</div>";
		 }
		 else
		 {
		  echo"<div id='msgbox'>";
         echo"error occured while changing your password!";
		 echo"</div>";
		 
		 }
		 }
		 else
		 {
		 echo"<div id='msgbox'>";
         echo"wrong old password!!";
		 echo"</div>";
		 
		 }
		 }
		 }
		}
		if(@$_GET['action']=='blockunblock')
		{
         ?>
		 <form method="post" action="">
		 select account here:<select name="account" style='width:20em;overflow:hidden;'>
		 <option style='width:12em;overflow:hidden;'></option>
		 <?php
		 $sql=mysqli_query($con,"SELECT * FROM `user`")or die(mysqli_error());
		 while($rows=mysqli_fetch_array($sql))
		 {
		 echo"<option style='width:12em;overflow:hidden;'>".$rows['firstname']." ".$rows['lastname']."/".$rows['username']."</option>";
		 }
		 ?>
		 </select><br>
		 <input type="submit" name="block" value="block">
		 <input type="submit" name="unblock" value="unblock">
		 </form>
		 <?php
		 //block user account 
		 if(isset($_POST['block']))
		 {
		 if($_POST['account']!='')
		 {
		 $username=explode("/",$_POST['account']);
		 $username=end($username);
		 $qry=mysqli_query($con,"UPDATE `user` SET `block`='yes' WHERE `username`='$username'")or die(mysqli_error());
		 if($qry)
		 {
		 echo"<div id='msgbox'>";
		 echo"account blocked!!";
		 echo"</div>";
		 }
		 else
		 {
		 echo"<div id='msgbox'>";
		 echo"account not blocked!!";
		 echo"</div>";
		 }
		 }
		 else
		 {
		 echo"<div id='msgbox'>";
		 echo"please select an account!!";
		 echo"</div>";
		 }
		 }
		 //unblock user account 
		 if(isset($_POST['unblock']))
		 {
		 if($_POST['account']!='')
		 {
		 $username=explode("/",$_POST['account']);
		 $username=end($username);
		 $qry=mysqli_query($con,"UPDATE `user` SET `block`=' ' WHERE `username`='$username'")or die(mysqli_error());
		 if($qry)
		 {
		 echo"<div id='msgbox'>";
		 echo"account unblocked!!";
		 echo"</div>";
		 }
		 else
		 {
		 echo"<div id='msgbox'>";
		 echo"account not unblocked!!";
		 echo"</div>";
		 }
		 }
		 else
		 {
		 echo"<div id='msgbox'>";
		 echo"please select an account!!";
		 echo"</div>";
		 }
		}
		//end of unblocking user accounts
		}
		//change profile pic 
		if(@$_GET['action']=='changepic')
			{
			?>
			<form method="post" action="" enctype="multipart/form-data">
			<input type="file" name="file" required />
			<input type="submit" name="upload" value="upload">
			</form>
			<?php
			//here are the code for change profile pics
		if(isset($_POST["upload"]))
			{
				if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/bmp") || ($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 20000000)){
				$filename=$_FILES["file"]["name"];
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
	mysqli_query($con,"UPDATE `admin` SET `img` = '".$filename."' WHERE `username`='".@$_SESSION['admin']."' ");
	
}
}
		//end of profile pic
		//view and block video u want
if(@$_GET['action']=='viewvideos')
{
$sel=mysqli_query($con,"SELECT * FROM `video` ");
$co=mysqli_num_rows($sel);
if($co > 0)
{
?>
<form method="post" action="">
<select name="video">
<?php
while($row=mysqli_fetch_array($sel))
{
echo"<option>".$row['name']."</option>";
}
?>
</select><br>
<input type="submit" name="block" value="block">
<input type="submit" name="unblock" value="unblock">
</form>
<?php
//block videos here!!
if(isset($_POST['block']))
{
$videoname=$_POST['video'];
$q=mysqli_query($con,"update `video` SET `block`='yes' WHERE `name`='$videoname'")or die(mysqli_error());
if($q)
{
echo"<div id='msgbox'>";
echo"video blocked!!";
echo"</div>";

}
else
{
echo"<div id='msgbox'>";
echo"error accured while blocking video!!";
echo"</div>";

}
}
//unblock videos here!!
if(isset($_POST['unblock']))
{
$videoname=$_POST['video'];
$q=mysqli_query($con,"update `video` SET `block`='' WHERE `name`='$videoname'")or die(mysqli_error());
if($q)
{
echo"<div id='msgbox'>";
echo"video unblocked!!";
echo"</div>";

}
else
{
echo"<div id='msgbox'>";
echo"error accured while blocking video!!";
echo"</div>";

}
}
}
else
{
echo"<div id='msgbox'>";
echo"there is no videos in database!";
echo"</div>";

}
}		
		//end of videos management
		  ?>
		  </div>
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
