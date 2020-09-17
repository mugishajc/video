

<form id="searchform" name="form1" method="post" action="">
<fieldset>
<input type="text" name="t1" id="s" onKeyUp="aa();" onkeypress="hideContent();" ondblclick="unhideContent();"><br>
</fieldset>
</form>
<script type="text/javascript">
function aa()
{
   xmlhttp=new XMLHttpRequest();
   xmlhttp.open("GET","search.php?q="+document.form1.t1.value,false);
   xmlhttp.send(null);
   //this is useful for store response
   document.getElementById("d1").innerHTML=xmlhttp.responseText;
}	 
function hideContent() {
document.getElementById("message").style.display="none";
document.getElementById("d1").style.display="block";  
}
function unhideContent() {
document.getElementById("message").style.display="block"; 
document.getElementById("d1").style.display="none"; 
}

</script>
