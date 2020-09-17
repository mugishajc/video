<?php
$con =mysqli_connect("localhost","root","","video");

//COUNT LIKES & DISLIKES
$q = mysqli_query($con,"SELECT * FROM $ratings WHERE id='$id' AND rating='like'");
$likes = mysqli_num_rows($q);
$q = mysqli_query($con,"SELECT * FROM $ratings WHERE id='$id' AND rating='dislike'");
$dislikes = mysqli_num_rows($q);

//LIKE & DISLIKE IMAGES
$l = 'images/l_color.png';
$d = 'images/d_color.png';

//CHECKS IF USER HAS ALREADY RATED CONTENT
$q = mysqli_query($con,"SELECT * FROM $ratings WHERE id='$id' AND ip='$ip'");
$r = mysqli_fetch_assoc($q); //CHECKS IF USER HAS ALREADY RATED THIS ITEM

//IF SO, THE RATING WILL HAVE A SHADOW
if($r["rating"]=="like"){
    $l = 'images/colorb.png';
}
if($r["rating"]=="dislike"){
    $d = 'images/bcolor.png';
}

//FORM & THE NUMBER OF LIKES & DISLIKES
$m = '<img id="like" onClick="rate($(this).attr(\'id\'))" src="'.$l.'"> '.$likes.' &nbsp;&nbsp; <img id="dislike" onClick="rate($(this).attr(\'id\'))" src="'.$d.'"> '.$dislikes;
    
?>