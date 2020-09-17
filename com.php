<html><head></script>
<body>
  <form method="post" action="" >
    User: <input type="text" name="username"  /><br>
    Comment:<textarea rows="5" cols="50" name="comment" ></textarea><br>
    <input type="submit" value="submit">
  </form>
  <button name="display" onclick="ajaxFunction();"></button>
  <script type="text/javascript">
  function ajaxFunction(){
  var ajaxRequest = new XMLHttpRequest();

  ajaxRequest.onreadystatechange = function(){
    if(ajaxRequest.readyState == 4){
      document.getElementById("commentarea").innerHTML = ajaxRequest.responseText;
      }
  }
  ajaxRequest.open("GET","fetchcomment.php",true);
  ajaxRequest.send(null);
}
</script>
  <h3>Comments go here:</h3>
  <div id="commentarea"></div>
</body>
</html>