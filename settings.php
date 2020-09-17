<?php

$con =mysqli_connect("localhost","root","","video");

//TABLES FOR THE CONTENT AND THE RATINGS (MODIFY IF TABLE NAMES ARE DIFFERENT)
$content = 'video';
$ratings = 'ratings';

$ip = $_SERVER["REMOTE_ADDR"]; //IP ADDRESS

?>