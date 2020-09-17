<html>
<body>
<form action="" method="post">
<table>
<tr><td>username:</td></tr><tr><td><input type="text" name="username" size="16"></td></tr>
<tr><td>E-mail:</td></tr><tr><td><input type="email" name="email" size="16"></td></tr>
<tr><td>comment:</td></tr>
<tr><td><textarea name="comment" cols="30" rows="5"></textarea></td></tr>
<tr><td><input type="submit" name="submit" value="submit"></td></tr>
</table>
</form>
<?php
$video_id=@$_GET['videoid'];
$con =mysqli_connect("localhost","root","","video");
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
<!--dispaly comment-->
<hr>
<?php
$query=mysqli_query($con,"SELECT * FROM `comments` ORDER BY `comment_id` DESC");
while($row = mysqli_fetch_assoc($query))
{
echo"
$row[username]<br/>
$row[comment]<br/>
$row[date]<br><br>
";

}





?>
</body>
</html>