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
.style1 {
	font-size: 24px;
	font-weight: bold;
}
.style3 {font-size: 18px}
.style4 {
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
</head>
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value==""
||document.form1.t5.value==""||document.form1.t6.value==""||document.form1.t7.value==""||document.form1.t8.value==""||document.form1.t8.value==""||document.form1.t10.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t6.value.length<6)
{
alert("Pin should be exact 6 digits");
return(false);

}
if(document.form1.t7.value.length<10)
{
alert("Phone  should be Min 10 digits");
return(false);

}
if(document.form1.t10.value.indexOf("@")==-1|| document.form1.t10.value.indexOf(".")==-1)
{
alert("Invalid Email");
return(false);

}

if(document.form1.t10.value.indexOf("@")==0)
{
alert("@ should not be the first char of email");
return(false);

}

if(document.form1.t10.value.indexOf(".")==0)
{
alert("dot(.) should not be the first char of email");
return(false);

}


}



</script>
<body>

<?php include ("p5.php"); ?>


<div id="Layer2" style="position:absolute; left:615px; top:124px; width:411px; height:417px; z-index:2; font-weight: bold; font-size: 24px;">
  <div align="center">
    <p>Supplier Registration </p>
    <form name="form12" method="post" onSubmit="return abc()"  action="supplier2.php">
      <table  width="318" height="322" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="131" height="31"><div align="left" class="style3 style4">
              <div align="left">Supplier Name</div>
          </div></td>
          <td width="175">
            <input name="t1" type="text" id="t1" onKeyPress="return alphabets(event)">
          </td>
        </tr>
        <tr>
          <td><div align="left" class="style3">
              <div align="left">Firm Name </div>
          </div></td>
          <td>
            <input name="t2" type="text" id="t2">
        </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Firm Address </span></div></td>
          <td>
            <input name="t3" type="text" id="t3">
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Location</span></div></td>
          <td>
            <input name="t4" type="text" id="t4">
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Place</span></div></td>
          <td>
            <input name="t5" type="text" id="t5" onKeyPress="return alphabets(event)">
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Pin Code </span></div></td>
          <td>
            <input name="t6" type="text" id="t6" onKeyPress="return numbers(event)" maxlength="6">
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Phone</span></div></td>
          <td>
            <input name="t7" type="text" id="t7" onKeyPress="return numbers(event)" maxlength="13">
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">State</span></div></td>
          <td>
            <input name="t8" type="text" id="t8">
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">District</span></div></td>
          <td>
            <input name="t9" type="text" id="t9">
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Email</span></div></td>
          <td>
            <input name="t10" type="text" id="t10" onKeyPress="return email(event)" >
          </td>
        </tr>
        <tr>
          <td height="48" colspan="2"><div align="left">
              <div align="center">
                <input type="submit" name="Submit22" value="Submit">
                <input type="reset" name="Reset2" value="Reset">
              </div>
              <span class="style3"></span></div></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
