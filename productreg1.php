<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<style type="text/css">
<!--
.style5 {font-size: 18px}
-->
</style></head>
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value==""
||document.form1.t5.value==""||document.form1.list.value==""||document.form1.file.value=="")
{
alert("Please enter All");
return(false);

}



}



</script>
<body>
<?php include ("p5.php"); ?>
<div id="Layer1" style="position:absolute; left:496px; top:156px; width:548px; height:510px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>New Product Registration </p>
    <form action="productreg2.php" method="post" enctype="multipart/form-data" onSubmit="return abc()" name="form1">
      <table width="478" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="196"><span class="style5">Product Name</span></td>
          <td width="276"><input name="t1" type="text" id="t1"></td>
        </tr>
        <tr>
          <td height="28"><span class="style5">Type</span></td>
          <td><select name="list" id="list">
            <option>select</option>
            <option value="keyboard">Keyboard</option>
			<option value="mouse">Mouse</option>
			<option value="cpu">CPU</option>
			<option value="monitor">Monitor</option>
			<option value="laptop">Laptop</option>
			<option value="desktop">Desktop</option>
          </select></td>
        </tr>
        <tr>
          <td><span class="style5">Price</span></td>
          <td><input name="t2" type="text" id="t2" onKeyPress="return numbers(event)" maxlength="8"></td>
        </tr>
        <tr>
          <td><span class="style5">GST % </span></td>
          <td><input name="t3" type="text" id="t3" onKeyPress="return numbers(event)" maxlength="3"></td>
        </tr>
        <tr>
          <td><span class="style5">Warranty</span></td>
          <td><input name="t4" type="text" id="t4" onKeyPress="return numbers(event)" maxlength="2"></td>
        </tr>
        <tr>
          <td><span class="style5">Select Picture </span></td>
          <td><input type="file" name="file"></td>
        </tr>
        <tr>
          <td>
            <div align="left"><span class="style5">Product Specification </span></div></td>
          <td><textarea name="t5" id="t5"></textarea></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="Submit" value="Submit">
            <input type="reset" name="Submit2" value="Reset">
          </div></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
