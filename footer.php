<?
$con =mysqli_connect("localhost","root","","video");
if($con)
{
?>
<p class="legal">
		&copy; <?php echo date('Y'); ?> MUGISHA BIT 3 ||CLASS ASSIGNMENT. All Rights Reserved
		&nbsp;&nbsp;&bull;&nbsp;&nbsp;
		 </p>
<?
}
else
{
echo"connect first".mysql_error();
}
?>