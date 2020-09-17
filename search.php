<link rel="icon" type="image/jpg" href="images/play.jpg" />
<link href="main.css" rel="stylesheet" type="text/css" media="screen" />
<link href="style_pages.css" rel="stylesheet" type="text/css" media="screen" />
<?php
$q=@$_GET['q'];

if($q=='')
{
 echo"please make search!!";
}
elseif($q=='adminlogin')
{
echo"<div id='box'>";
echo"<div id='url'>";
?>
<h2><a href="adminlogin.php"><font color="green">adminlogin --></font></a></h2>
<?php

echo"</div>";
echo"</div>";
}
else
{
$q=@$_GET['q'];
$per_page = 5;
$con =mysqli_connect("localhost","root","","video");

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
$query=mysqli_query("SELECT * from video where name like'%$q%'LIMIT $start,$per_page");  
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