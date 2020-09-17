<?php
$con =mysqli_connect("localhost","root","","video");
session_start();
unset($_SESSION['adminlogin']);
header('location:index.php');
?>