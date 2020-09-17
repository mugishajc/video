<?php
$con =mysqli_connect("localhost","root","","video");

$id = $_POST["id"];
$rating = $_POST["rating"];
$rating_type = array("like", "dislike");

if(in_array($rating, $rating_type)){
    
    include("settings.php"); //INCLUDES THE IMPORTANT SETTINGS
    
    //CHECKS IF $id EXISTS
    $q = mysqli_query($con,"SELECT * FROM $content WHERE id='$id'");
    $r = mysqli_fetch_assoc($q);
    $id = $r["id"]; //NEW ID VARIABLE, USED TO CHECK IF IT'S IN THE DATABASE
    
    //COUNTS LIKES & DISLIKES IF $id EXISTS
    if($id)
    {
        //CHECKS IF USER HAS ALREADY RATED CONTENT
        $q = mysqli_query($con,"SELECT * FROM $ratings WHERE id='$id' AND ip='$ip'");
        $r = mysqli_fetch_assoc($q); //CHECKS IF USER HAS ALREADY RATED THIS ITEM
        
        //IF USER HAS ALREADY RATED
        if($r["rating"]){
            if($r["rating"]==$rating){
                mysqli_query($con,"DELETE FROM $ratings WHERE id='$id' AND ip='$ip'"); //DELETES RATING
            } else {
                mysqli_query($con,"UPDATE $ratings SET rating='$rating' WHERE id='$id' AND ip='$ip'"); //CHANGES RATING
            }
        } else {
            mysqli_query($con,"INSERT INTO $ratings VALUES('$rating', '$id', '$ip')"); //INSERTS INITIAL RATING
        }
        
        include 'headers.php'; //FILE WITH THE NUMBER OF RATINGS, BUTTON IMAGE URLS, AND WHETHER USER HAS RATED
     
        //EVERYTHING HERE DISPLAYED IN HTML AND THE "ratings" ELEMENT FOR AJAX
        echo $m;
    }
    else
    {
        echo "Invalid ID";
    }
}

?>