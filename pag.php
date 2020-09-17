<?php
$con =mysqli_connect("localhost","root","","video");

$per_page = 5;
$pages_query =mysqli_query($con,"SELECT COUNT(`id`) FROM(`color_tb`) ");
$pages = ceil(mysqli_result($pages_query,0)/$per_page);

if(!isset($_GET['page']))
{
 header("location: index.php?page=1");
}
else
{
$page = $_GET['page'];
}
$start = (($page - 1)*$per_page);
$colors = mysqli_query("SELECT * FROM color_tb LIMIT $start,$per_page");

while($row = mysqli_fetch_assoc($colors))
{
$color = $row['color'];
echo "$color<br/>";
}

for($number=1;$number<=$pages;$number++)   
{
?>
<a href="?page=<?php echo $number; ?>"><?php echo $number; ?></a>
<?php
}
echo "<br>Current Page: $page";
?>