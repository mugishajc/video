<?php
$con =mysqli_connect("localhost","root","","video");
 
/* Now we will store the values submitted by form in variable */
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$sex=$_POST['sex'];
$age=$_POST['age'];
$username=$_POST['username'];
$pass=$_POST['password'];
/* we are now encrypting password while using md5() function */
$password=md5($pass);
$confirm_password=$_POST['confirm_password'];
 
/* Now we will check if username is already in use or not */
$queryuser=mysqli_query($con,"SELECT * FROM `user` WHERE username='$username' ");
$checkuser=mysqli_num_rows($queryuser);
if($checkuser != 0)
{
$message="Sorry, ".$username." is already been taken."; 
include("signup.php");
}
else {
 
/* now we will check if password and confirm password matched */
if($pass != $confirm_password)
{ 
$message="Password and confirm password fields were not matched";
include("signup.php");
 }
else {
 
/* Now we will write a query to insert user details into database */
$insert_user=mysqli_query($con,"INSERT INTO `user` (userid,firstname,lastname,email,sex,age,username, password) VALUES ('','$firstname','$lastname','$email','$sex','$age','$username','$password')");
 
if($insert_user)
{ 
echo "Registration Succesfull";
session_start();
$_SESSION['login']=true;
header('location:profile.php?username='.$username.'');
 }
else
{ 
echo "error in registration".mysqli_error(); }
 
/* closing the if else statements */
}}
 
mysqli_close($con);
?>