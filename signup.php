
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="icon" type="image/jpg" href="images/play.jpg" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>online video streaming</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="main.css" rel="stylesheet" type="text/css" media="screen" />
<!-- including jquery   -->
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="confirmpass.js"></script>
</head>
<body>
<!-- start header -->
<div id="wrapper">
<div id="header">
	<div id="logo">
		<h1><a href="#">videostreaming</a></h1>
	</div>
	<div id="youtube"></div>
	<div id="search">
<?php include("searchform.php"); ?>
</div>
</div>
<!-- end header -->
<!-- star menu -->
<div id="menu">
	<?php include("menu.php");?>
</div>
<!-- end menu -->
<!-- start page -->
<div id="page">
<!-- start ads -->
	<div id="ads"><a href="#"><img src="images/mtn.gif" alt="" width="160" height="600" /></a></div>
	<!-- end ads -->
	<!-- start content -->
	<div id="content">
		<div class="post">
			<div class="title">
			<div id="message">
				<h2><a href="#">get your account here now!</a></h2>
				<?php echo"<h3><font color='red'>".@$message."</font></h3>"; ?>
<form method="post" action="account.php">
<table border="0">
 <tr><td>Firstname: </td><td><input type="text" name="firstname" pattern="([a-zA-Z@!.* ]{2,100})" required /></td></tr>
 <tr><td>Lastname: </td><td><input type="text" name="lastname" pattern="([a-zA-Z@!.* ]{2,100})" required /></td></tr>
 <tr><td>E-mail: </td><td><input type="email" name="email" required /></td></tr>
 <tr><td>sex: </td><td><select name="sex"required><option value="male">male</option><option value="female">female</option></select></td></tr>
 <tr><td>age: </td>
 <td>
 <select name="age">
 <?php
 for($i=date('Y',time());$i>date('Y',time())-100;$i--)
 {
 echo"<option>".$i."</option>";
 }
 ?>
 </select>
 </td>
 </tr>
<tr><td>Username: </td><td><input type="text" name="username" required /></td></tr>
 
<tr><td>Password: </td><td><input type="password" name="password" class="pass" required /></td></tr>
 
<tr><td>Confirm Password: </td><td><input type="password" name="confirm_password" class="cpass" required /></td></tr>
 
<tr><td></td><td><input type="submit" value="submit" /></td></tr>
 
</table>
</form>
    </div>
              <div id="d1"></div>
          
            	</div>
		</div>
	</div>
	</div>
<div id="footer">
	<?php
	include("footer.php");
	?>
</div>
</div>
<!-- end footer -->
</body>
</html>

