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
	<div id="search">
		<?php include("searchform.php"); ?>
	</div>
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<?php include("menu.php"); ?>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
		<div class="post">
			<div class="title">
			<div id="message">
				<h2><a href="#">Upload here!</a></h2>
<?php
$con =mysqli_connect("localhost","root","","video");
?>
<div id='box'>
<?php
    if(isset($_POST['submit']))
	{
	//var_dump($_FILES['video']['name']);
	//return;
     $name = $_FILES['video']['name'];
     $type=explode('.', $name);
	 $type = end($type);
	 $type = strtolower($type);
	 $size = $_FILES['video']['size'];
	 $random_name = rand();
	 $tmp = $_FILES['video']['tmp_name'];
	 
	  if($type == 'flv')
	  {
	   $tmp = $_FILES['video']['tmp_name']; 
	   $ffmpeg = "c:\\ffmpeg\\bin\\ffmpeg";
	   shell_exec("$ffmpeg -i $tmp -an -ss 60 -s 120x90 thumbs/$random_name.jpg");
	   move_uploaded_file($tmp,'videos/'.$random_name.'.'.$type);
	   } 	 
	  elseif($type == 'mp4')
	  {
	  $tmp = $_FILES['video']['tmp_name']; 
	   $ffmpeg = "c:\\ffmpeg\\bin\\ffmpeg";
	   shell_exec("$ffmpeg -i $tmp -an -ss 60 -s 120x90 thumbs/$random_name.jpg");
	   move_uploaded_file($tmp,'videos/'.$random_name.'.'.$type);
	   }
	  else
	  {
	  //conventing process here!!
	  $ffmpeg = "c:\\ffmpeg\\bin\\ffmpeg";
	  shell_exec("$ffmpeg -i $tmp videos/$random_name.flv");
	  $type="flv";
	  }
	       /*
       comments

      -i input file name
	  -an disabled audio 
	  -ss get image from X seconds in video
	  -s size of image 
        */
	  
		
//get thumbnail from the video 
$ffmpeg = "c:\\ffmpeg\\bin\\ffmpeg";
//echo $ffmpeg;
$videoFile = $tmp;
$size = "120x90";
$getFromSecond = 60;
//now full command to create thumbnails
$con =mysqli_connect("localhost","root","","video");
shell_exec("$ffmpeg -i $videoFile -an -ss $getFromSecond -s $size thumbs/$random_name.jpg");
       $pic="jpg";
	  $thumbs=$random_name.'.'.$pic;
	  $name=mysqli_real_escape_string(htmlentities($name));
	  mysqli_query($con,"INSERT INTO `video` VALUES('','$name','$random_name.$type','$thumbs','".@$_GET['userid']."','','')")or die(mysqli_error());
	  $message="successfully uploaded!";
    echo "$message <br/><br/>";
     }
?>
<form method="post" action="upload.php?userid=<?php echo $_GET['userid']; ?>" enctype="multipart/form-data">
select video: <br/>
<input type='file' name='video' />
<br/><br/>
<input type='submit' name='submit' value='upload'/>
</form>
</div>
<div id='box'>
<?php
$query=mysqli_query($con,"SELECT `id`,`name`,`url` FROM video WHERE `userid`='".@$_GET['userid']."'");
while($run=mysqli_fetch_array($query))
{
$video_id = $run['id'];
$video_name = $run['name'];
$video_url = $run['url'];
?>
 <a href='view.php?videoid=<?php echo $video_id; ?>'>
 <div id='url'>
 <?php
 echo $video_name; ?>  </a>&nbsp;<a href="delete.php?id=<?php echo $video_id; ?>&userid=<?php  echo @$_GET['userid'];   ?>"><font color="green"><b>remove</b></font></a>
 </div>

<?php
}
?>
</div> 
	</div>
	<!-- end content -->
    </div>
</div>
<!-- end page -->
<!-- start footer -->
<div id="footer">
	<? include("footer.php"); ?>
</div>
</div>
<!-- end footer -->
</body>
</html>