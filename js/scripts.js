$(document).ready(function(){
//removed cz isn't work as i wish
/*
//count video views
  $("#box").click(function() {
 var videoid=$("#videoid").val();
 $.get("counter.php?videoid="+videoid,function(){
  });
    });
	*/
//send comment 

$("#sub").click(function(){
var videoid=$("#videoid").val();
   var username=$("#username").val();
   var email=$("#email").val();
   var com=$("#com").val();
   var sub=$("#sub").val();
    $.post("view.php?videoid="+videoid,{username:username,email:email,comment:com,submit:sub},function(result){
	
    });
  });
//hide comment when page laod
  $(".comment form").hide();
$(".links").click(function(){
$(".comment form").slideDown(555);
});
});
//getting likes and dislikes of videos
/*setInterval(function(){

$('#likescounter').load('loadlikes.php');
}, 300);
//function to set like
function likePage() {

$.post('likedislike.php',
{
action: "like"
}, function() {

});

}
//function to set dislike 
function dislikePage() {

$.post('likedislike.php',
{
action: "dislike"
}, function() {


});

}
*/
