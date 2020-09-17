<html>
<head>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/scripts.js"></script>

<link rel="icon" type="image/jpg" href="images/play.jpg" />
<link href="video-js/video-js.css" rel="stylesheet">
   <script src="video-js/video.js"></script>
   <script>
     _V_.options.flash.swf = "video-js/video-js.swf"
   </script>
<title>
video upload system
</title>
<link rel='stylesheet' href='style.css'/>
<link rel='stylesheet' href='main.css'/>
<style type='text/css'>
#views{
position:relative;
top:0.3em;
left:28.7em;
width:10em;
height:1.6em;
background:#456789;
-webkit-box-shadow: inset 0 0 10px 0 rgba(0, 0, 0,1);
box-shadow:  inset 0 0 10px 0 rgba(0, 0, 0, 1);
padding:0.2em;
padding-left:0.8em;
color:orange;
font-size:14px;
font-variant:small-caps;
border-radius:0.5em;
text-shadow:inset 2px 2px 1px rgba(0, 0, 0, 1);
cursor:pointer;
}
#label{
-webkit-box-shadow: inset 0 0 10px 0 rgba(23, 22, 19,1);
box-shadow:  inset 0 0 10px 0 rgba(23, 22, 19,1);
padding-left:0.8em;
color:orange;
font-size:14px;
font-variant:small-caps;
border-radius:0.5em;
text-shadow:inset 2px 2px 1px rgba(0, 0, 0, 1);
cursor:pointer;
}
</style>
</head>
<body onload="getviews();sendrequest();">
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
<!-- start ads -->
<div id="ads"><a href="#"><img src="images/mtn.gif" alt="" width="160" height="600" /></a></div>
<!-- end ads -->
<!-- start content -->
<div id="d1" style='width:50%;'></div>
<div id="message">
<div class="post">
<div class="title">
<?php
include 'connect.php';
?>
<div id='box'>
<?php

$con =mysqli_connect("localhost","root","","video");

/*WHERE `id`='$videoid'*/
$sql="SELECT * FROM `video` ";
$videoid=@$_GET['videoid'];
if(isset($videoid))
{
$video=mysqli_query($con,$sql);
while($run=mysqli_fetch_array($video))
{
$video_id = $run['id'];
$video_url = $run['url'];
$videoname = $run['name'];
$thumbs = $run['thumbs'];
//echo $run['block'];
//get video extension
$ext=explode(".",$video_url);
$ext=end($ext);
if($run['block']!='yes')
{
unset($_SESSION['block']);
mysqli_query($con,"UPDATE `video` SET `views`=`views`+1 WHERE `id` ='".$_GET['videoid']."'")or die(mysqli_error());
?>
<video  id="example_video_1" class="video-js vjs-default-skin"  
     controls preload="auto" width="540" height="400" id="preload" 
     poster="thumbs/<?php echo $thumbs; ?>"  
     data-setup='{"example_option":true}'> 
    <source  src='videos/<?php echo $video_url; ?>' type='video/<?php echo $ext; ?>' /> 
   </video>
</div>
<div id="vd" value="<?php echo @$_GET['videoid']?>"></div>
<h3><label id="label"><?php echo $videoname;?></label>&nbsp;&nbsp;<div id="views">+<span id="resviews"></span> Views
</div>
<?php }else{ 
$_SESSION['block']=$_GET['videoid'];
echo"<h3><font color='green'>this video have been block because it's contain illegal content!!</font></h3>"; } }?>
<!--code for count like AND dislike-->

<?php

//GOES TO ID 1 AUTOMATICALLY IF THERE'S NO ID IN THE URL
if($_GET["videoid"]){
 {
    $id = $_GET["videoid"];
}

include("settings.php"); //INCLUDES THE IMPORTANT MySQL SETTINGS

$q = mysqli_query($con,"SELECT * FROM $content WHERE id='$id'"); //GETS THE CONTENT ID
$r = mysqli_fetch_assoc($q);
$con = $r["name"]; //CONTENT OF THE ID
$id = $r["id"]; //NEW ID VARIABLE, USED TO CHECK IF IT'S IN THE DATABASE

?>
<script src="jquery.js"></script>
<script>
function rate(rating){ //'rating' VARIABLE FROM THE FORM in view.php
var data = 'rating='+rating+'&id=<?php echo $id; ?>';

$.ajax({
type: 'POST',
url: 'rate.php', //POSTS FORM TO THIS FILE
data: data,
success: function(e){
$("#ratings").html(e); //REPLACES THE TEXT OF view.php
}
});
}
</script>
<style>
/*GIVES THE POINTER TO THE BUTTONS ON MOUSEOVER*/
#like, #dislike {
cursor: pointer;
}
</style>
<?php

//IF $id EXISTS, THEN COUNT LIKES & DISLIKES
if($id){
    include 'headers.php'; //FILE WITH THE NUMBER OF RATINGS, BUTTON IMAGE URLS, AND WHETHER USER HAS RATED
    
    //EVERYTHING HERE DISPLAYED IN HTML
	if(@$_SESSION['block']==$_GET['videoid'])
	{
	echo"";
	}
	else
	{
   echo'<br><br><br><div id="ratings">'.$m.'</div>';
   }
   
}
else
{
    echo "Invalid ID";
}

?>

<!--end for like dislike system--> 
</div>
</div>
<div class="post">
<p class="links" id="hide">comments </p>
<div class="comment">
<!--comment script here!-->

<!--form for comment-->
<?php
if(isset($_SESSION['login']))
{
?>
<form action="" method="post" class="form" id="myForm">
<table>
<tr><td>username:&nbsp;&nbsp;&nbsp;<?php echo @$_SESSION['username'];  ?></td></tr><tr><td><input type="hidden" name="username" value="<?php echo @$_SESSION['username']; ?>" id="username" size="16"></td></tr>
<tr><td>E-mail:&nbsp;&nbsp;&nbsp;<?php echo @$_SESSION['email'];  ?></td></tr><tr><td><input type="hidden" name="email" id="email" value="<?php  echo @$_SESSION['email']; ?>" size="16"></td></tr>
<tr><td>comment:</td></tr>
<tr><td><textarea name="comment" id="com" cols="30" rows="5"></textarea></td></tr>
<tr><td><input type="button" name="submit" id="sub" value="submit"></td></tr>
<input type="hidden" id="videoid" value=<?php echo @$_GET['videoid']?>>
</table>
</form>
<?php
}
}
$video_id=@$_GET['videoid'];
include("connect.php");
//if submit button clicked
if(@$_POST['submit'])
{
//preventing mysql injection
$username = mysqli_real_escape_string(htmlentities($_POST['username']));
$email = mysqli_real_escape_string(htmlentities($_POST['email']));
$comment = mysqli_real_escape_string(htmlentities($_POST['comment']));
//check fields
if($username && $comment && $email)
{
$date = date("F j, Y, g:i a");
mysqli_query($con,"INSERT INTO `comments` VALUES ('','".$comment."','".$username."','".$email."','".$date."','".$video_id."')");
echo "Your comment has been submited";
}
else
{
echo"please fill in all the fields.";
}
}
?>
<!--end of comment script-->
</div>
<!--dispaly comment-->
<hr style="float:left" width="48%"><br>
<script type="text/javascript">
function sendrequest()
{
setInterval(function getNumber()
{
   xmlhttp=new XMLHttpRequest();
   xmlhttp.open("GET","getcomment.php?videoid=<?php echo $videoid; ?>",false);
   xmlhttp.send(null);
   //this is useful for store response
   document.getElementById("result").innerHTML=xmlhttp.responseText;
},333);
}
function getviews()
{
setInterval(function getv()
{
   xmlhttp=new XMLHttpRequest();
   xmlhttp.open("GET","getviews.php?videoid=<?php echo $videoid; ?>",false);
   xmlhttp.send(null);
   //this is useful for store response
   document.getElementById("resviews").innerHTML=xmlhttp.responseText;
},333);
}
</script>
<div id="result"></div>
<!--end of displaying comments-->
</div>
<!-- end content -->
</div>
<!-- start sidebar -->
<!-- end sidebar -->
</div>
<!-- end page -->
<div id="d1"></div>
<!-- start footer -->
<div id="footer">
<?php 
}
include("footer.php");
?>