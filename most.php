
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
#slideshow { 
    margin: 50px auto; 
    position: relative; 
    width: 45em; 
    height: 25em; 
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0,1);
	border:none;
	border-top:solid 0px green;
}
#slideshow:hover{
	border:solid 1px green;
	border-top:solid 0px green;
}
#slideshow > div { 
    position: absolute; 
    top: 20px; 
    left: 10px; 
    right: 10px; 
    bottom: 10px; 
	width:;
	height:;
}
#slideshow #vdname{
position:absolute;
top:-4em;
left:-.7em;
background:#999;
width:101%;
font-size:large;
padding-left:1em;
padding-top:1em;
padding-bottom:1em;
border-radius:.8em;
}
#content #play{
position:absolute;
top:8em;
left:17em;
width:8em;
height:6em;
background:url(images/play_btn.png) no-repeat center;
background-size:80%;
border-radius:.5em;
}
#content #play:hover{
background:url(images/play_btn2.png) no-repeat center;
background-size:80%;
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script>
$(document).ready(function(){
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(2000)
    .next()
    .fadeIn(2000)
    .end()
    .appendTo('#slideshow');
},  5000);
});
</script>		
</head>
<body>
<!--startheader-->
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
$query=mysqli_query($con,"SELECT * FROM `video` ORDER BY `views` DESC LIMIT 5")or die(mysqli_error());
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
 <div><img src="thumbs/<?php echo $thumbs; ?>" height="100%" width="100%"><a href='view.php?videoid=<?php echo $videoid; ?>'><span id='vdname'>
 <?php echo $videoname; ?></span><nav id="play"></nav></a></div>
<?php
}
}
?>			

    </div>
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

