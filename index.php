
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
#video_adv{
position:relative;
top:0.5em;
left:-0.3em;
width:63em;
height:25em;
background:none;
border:none;
border-radius:.42em;
box-shadow:inset 0px -4px 4px #000;
}
#video_adv .video_thumbs{
position:absolute;
left:0.3em;
top:0.5em;
width:100%;
height:95%;
background:none;
direction:rtl;
}
#video_adv .video_thumbs img{
width:50%;
height:95%;
position:relative;
top:0.6em;
left:-31em;
}
#video_adv #vdname{
position:absolute;
top:0.5em;
left:32.6em;
width:auto;
height:3em;
padding-left:0.7em;
padding-right:0.7em;
padding-top:0.7em;
background:#606960;
border-radius:0.3em;
font-size:12px;
color:darkorange;
box-shadow:inset 0px -5px 10px #999999;
text-shadow:0px -5px 10px #444;
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script>
$(document).ready(function(){
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .hide(2000)
    .next()
    .show(2000)
    .end()
    .appendTo('#slideshow');
},  5000);
});
</script>
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
				<h2><a href="#">VIDEO STREAMING</a></h2>
               <video id="example_video_1" class="video-js vjs-default-skin"  
      controls preload="auto" width="440" height="300"  
      poster="images/latimore.png"  
      data-setup='{"example_option":true}'> 
       
     <source src="videos/latimore.mp4" type="video/mp4" />  
    </video>
	<nav id="video_adv">
	<nav class="video_thumbs">
	<?php
$con =mysqli_connect("localhost","root","","video");
	$sql="SELECT * FROM `video` ORDER BY `views` DESC LIMIT 20";
	$query=mysqli_query($con,$sql);
$count=mysqli_num_rows($query);
if($count> 0)
{
?>

<div id="slideshow">
<?php
while($rows=mysqli_fetch_array($query))
{
$videoid = $rows['id'];
$video_url = $rows['url'];
$videoname = $rows['name'];
$thumbs = $rows['thumbs'];
?>
 <div><img src="thumbs/<?php echo $thumbs; ?>" height="100%" width="100%"><a href='view.php?videoid=<?php echo $videoid; ?>'><nav id="vdname">
 <?php echo $videoname; ?></nav><nav id="play"></nav></a></div>
<?php
}
}
?>			
</nav>
    </div>
	</nav>
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

