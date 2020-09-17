<?php
@session_start();
if($_SESSION['login']!=true){
	header("Location:logout.php");
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
<style type='text/css'>
#profile #pro_img #userimg{
boder:solid 2px red;
border-radius:1em;
}

</style>
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
	<div id="procontent">
		<div class="post">
			<div class="title">
			<div id="message">
			<?php
			$con =mysqli_connect("localhost","root","","video");
			//profile code here!!!
			$username=@$_GET['username'];
			$_SESSION['username']=$username;
			if($username=='')
			{
			header('location:index.php');
			}
			else
			{
			$query=mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$username'");
			echo "<nav id='profile'>";
			while($row=mysqli_fetch_array($query))
			{
			$_SESSION['userid']=$row['userid'];
			//check if user have image
			if($row['userimg']=='')
			{
			//check user sex
			if($row['sex']=='male')
			{
			echo"<div id='pro_img' >";
			echo"<img src='images/male.jpg' height='150' width='150'/>";
			echo"</div>";
			}
			if($row['sex']=='female')
			{
			echo"<div id='pro_img'>";
			echo"<img src='images/female.jpg' height='150' width='150'>";
			echo"</div>";
			}
			echo"<br/>";
			echo"<a href='?username=".$row['username']."&action=upload'>upload your profile picture<br/><img src='images/upload.jpg' height='20' width='20'></a><br/>";
			}
			else
			{
			?>
			<div id='pro_img' >
			<img src='images/<?php echo $row['userimg']; ?>' height='150' width='150'/><br/>
			</div>
			<a href="profile.php?username=<?php echo $username;?>&action=change">change profile picture<br/><img src="images/upload.jpg" height="20" width="20"></a><br/>
			<?php
			}
			echo"<nav id='formforprofile'>";
			echo"<label>".$row['firstname']." ".$row['lastname']." "."<a href='?username=".$row['username']."&action=names'><img src='images/edit-icon.png' heigth='20' width='20'></a><br/></label>";
			//calculating user age
		    $age = date('Y',time())-$row['age'];
           	//display user age
			echo"<label>Age:".$age."<a href='?username=".$row['username']."&action=age'><img src='images/edit-icon.png' heigth='20' width='20'></a><br/></label>";
            //display user email
			//set email session
			$_SESSION['email']=$row['email'];
			echo"<label>E-mail:".$row['email']."<a href='?username=".$row['username']."&action=email'><img src='images/edit-icon.png' heigth='20' width='20'></a><br/></label>";			
            //uploading process
			echo"<br><a href='upload.php?userid=".$row['userid']."'><label>upload videos here!</label></a>";
			//checking video for this user 
			$vid=mysqli_query($con,"select * from `video` where `userid`='".$row['userid']."'")or die(mysqli_error());
			//count number of videos found
			$vidnum=mysqli_num_rows($vid);
			echo"<br><br>your videos:<br><div id='vidnum'> +".$vidnum."</div>";
			}
			}
			echo"</nav>";
			echo "</nav>";
             ?>
    </div>
            	</div>
		</div>
	</div>
	</div>
	<div id="pro-content">
	<div id="d1"></div>
	<?php if(@$_GET['action']=='change')
	{
	?>
	<form method="post" action="editpro.php?action=change&userid=<?php echo $_SESSION['userid'];?>" enctype="multipart/form-data">
<input type="file" name="file" required/>
<input type="submit" name="upload" value="upload">
</form>
    <?php
	} 
	if(@$_GET['action']=='names')
	{
    ?>
	<form method="post" action="editpro.php?action=names&userid=<?php echo $_SESSION['userid']; ?>">
	firstname:<input type="text" name="firstname" pattern="([a-zA-Z@!.* ]{2,100})" required /><br>
	lastname:<input type="text" name="lastname" pattern="([a-zA-Z@!.* ]{2,100})" required />
	<input type="submit" name="updatenames" value="update">
	</form>
	<?php
	}
	if(@$_GET['action']=='age')
	{
	?>
	<form method="post" action="editpro.php?action=age&userid=<?php echo $_SESSION['userid']; ?>">
	new birth year:<select  name="age" height="200" required>
	<option></option>
	<?php
	for($i=date('Y',time());$i>date('Y',time())-100;$i--)
	{
	echo"<option>".$i."</option>";
	}
	?>
	</select>
	<br/>
	<input type="submit" name="apply" value="apply">
	</form>
	<?php
	}
	if(@$_GET['action']=='email')
	{
	?>
	<form method="post" action="editpro.php?action=email&userid=<?php echo $_SESSION['userid']; ?>">
	new E-mail:<input type="email" name="email" required />
	<input type="submit" name="apply" value="apply">
	</form>
	<?php
	}
	if(@$_GET['action']=='upload')
	{
	?>
	<form method="post" action="editpro.php?action=upload&userid=<?php echo $_SESSION['userid'];?>" enctype="multipart/form-data">
	<input type="file" name="file" required/>
	<input type="submit" name="upload" value="upload">
	</form>
	<?php
	}
	?>
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

