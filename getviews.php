<?php
$con =mysqli_connect("localhost","root","","video");
if($_GET['videoid'])
{
$query=mysqli_query($con,"SELECT `views` FROM `video` WHERE `id` ='".$_GET['videoid']."'")or die(mysqli_error());
while($row=mysqli_fetch_array($query))
{
echo $row['views'];
}
}
?>
