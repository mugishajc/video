<html>
<?php 
$number = (int) $_GET['videoid']; //takes the number from URL 
 
if (empty($number)) 
   die; 
 
$con =mysqli_connect("localhost","root","","video");
 
$query = mysqli_query($con,"SELECT * FROM `comments` WHERE video_id='$number' ORDER BY `comment_id` DESC")or 
die(mysqli_error()); 
 
$num = mysqli_num_rows($query); 
 
if (empty($num)) 
   $send = 'No comment found'; 
else 
echo"<nav id='all_comments_holder'>";
   while($com = mysqli_fetch_array($query))
{
$ig=mysqli_query($con,"select * FROM `user` WHERE `username`='".$com['username']."'")or die(mysqli_error());
$img=mysqli_fetch_array($ig);
if($img['userimg']=='')
{
$img['userimg']='both.jpg';
}
?>
<body>

<nav id="comments_holder">
<div id="pic_comment"><img src="images/<?php echo $img['userimg'];?>" width="100%" height="100%" alt="<?php //echo $com['username']?>"></div>
<div id="poster_name"><label><?php echo $com['username'];?></label></div>
<div id="date_comment"><label><?php	echo $com['date'];?><label></div> 
<div id="comment_box"><label><?php	echo $com['comment'];?></label></div>
</nav>
</body>	
<?php
   }
   ?>
 </nav>  
</html>