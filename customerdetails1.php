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
.style1 {font-size: 18px}
-->
</style></head>
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value==""
||document.form1.t5.value==""||document.form1.t6.value==""||document.form1.t7.value==""||document.form1.t8.value==""||document.form1.t8.value==""||document.form1.t10.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t4.value.length<6)
{
alert("Pin should be exact 6 digits");
return(false);

}
if(document.form1.t5.value.length<10)
{
alert("Phone  should be Min 10 digits");
return(false);

}
if(document.form1.t9.value != document.form1.t10.value)
{
alert("Password and Retype Password should be Same");
return(false);

}

}



</script>
<body>
<?php include("p1.php");  ?>
<div id="Layer1" style="position:absolute; left:548px; top:92px; width:465px; height:449px; z-index:1; font-weight: bold; font-size: 24px;">
  <div align="center">
    <br><br><br><p>Customer Registration</p>
    <form name="form1" method="post" onSubmit="return abc()" action="customerdetails2.php">
      <table width="319" height="216" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="152"><span class="style1">Name</span></td>
          <td width="161"><input name="t1" type="text" id="t1" onKeyPress="return alphabets(event)"></td>
        </tr>
        <tr>
          <td><span class="style1">House Name</span></td>
          <td><input name="t2" type="text" id="t2"></td>
        </tr>
        <tr>
          <td><span class="style1">Place</span></td>
          <td><input name="t3" type="text" id="t3"></td>
        </tr>
        <tr>
          <td><span class="style1">Pin</span></td>
          <td><input name="t4" type="text" id="t4" onKeyPress="return numbers(event)" maxlength="6"></td>
        </tr>
        <tr>
          <td><span class="style1">Phone</span></td>
          <td><input name="t5" type="text" id="t5" onKeyPress="return numbers(event)" maxlength="13"></td>
        </tr>
        <tr>
          <td><span class="style1">Location</span></td>
          <td><input name="t6" type="text" id="t6"></td>
        </tr>
        <tr>
          <td><span class="style1">State</span></td>
          <td><input name="t7" type="text" id="t7"></td>
        </tr>
        <tr>
          <td><span class="style1">District</span></td>
          <td><input name="t8" type="text" id="t8"></td>
        </tr>
        <tr>
          <td><span class="style1">Password</span></td>
          <td><input name="t9" type="password" id="t9"></td>
        </tr>
        <tr>
          <td><span class="style1">Retype Password </span></td>
          <td><input name="t10" type="password" id="t10"></td>
        </tr>
        <tr>
          <td colspan="2"><div align="right">
            <input type="submit" name="Submit" value="Submit">
            <input type="reset" name="Submit2" value="Reset">
          </div></td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </form>
    <p>&nbsp;</p>
  </div>
</div>

</body>
</html>
