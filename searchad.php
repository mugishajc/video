
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
<link href="style_pages.css" rel="stylesheet" type="text/css" media="screen" />
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
$q=@$_GET['q'];
$con =mysqli_connect("localhost","root","","video");
if($q=='')
{
 echo"please make search!!";
}
else
{
$q=@$_GET['q'];
$per_page = 5;
$pages_query =mysqli_query($con,"SELECT COUNT(`id`) FROM(`video`) WHERE `name` LIKE '%$q%' ");
$result=mysqli_result($pages_query,0);
$pages = ceil($result/$per_page);
if(!isset($_GET['page']))
{
 header("location: search.php?q=$q&page=1");
}
else
{
$page = $_GET['page'];
}
$start = (($page - 1)*$per_page);
$coun=mysqli_query($con,"SELECT * from video where name like'%$q%'");
$starttime=microtime(true);
$query=mysqli_query($con,"SELECT * from video where name like'%$q%'LIMIT $start,$per_page");  
$endtime=microtime(true);
$duration=$endtime-$starttime;
$count=mysqli_num_rows($coun);
if($count<=0)
{
echo"<h3>no result found for: ".$_GET['q']."&nbsp;&nbsp;"."in(".round($duration,5).") second!!</h3>";
echo"<div id='box'>";
}
else
{
echo"<h3>we find ".$count." result for: ".$_GET['q']."       "."in(".round($duration,5).") second!!</h3><br/>";
while($run=mysqli_fetch_array($query))
{
$videoid = $run['id'];
$video_name = $run['name'];
$video_url = $run['url'];
?>
<div id='url'><table><tr><td><img src="thumbs/<?php echo $run['thumbs'] ?>" height="100" width="100"></td><td><a href='view.php?videoid=<?php echo $videoid; ?>'>
 <?php echo $video_name; ?></a></td></tr></table></div>
 <?php
 }
 echo"<br/>";
//checking for next and prev button
$next=$page+1;
$prev=$page-1;
if($prev<=0)
{
$prev=1;
}
if($next>=$pages)
{
$next=$pages;
}
?>
<a id="pages" href="searchad.php?q=<?php echo$q;?>&page=<?php echo $prev; ?>"><<</a>
<?php
for($number=1;$number<=$pages;$number++)   
{
?>
<a id="pages" href="searchad.php?q=<?php echo$q;?>&page=<?php echo $number; ?>"><?php echo $number; ?></a>
<?php
}
?>
<a id="pages" href="searchad.php?q=<?php echo$q;?>&page=<?php echo $next; ?>">>></a>
<?php
}
}
?>
       
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

