<?php
$con =mysqli_connect("localhost","root","","video");
session_start();
session_destroy();
header('location:index.php');
?>