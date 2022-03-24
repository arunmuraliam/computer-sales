<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Staff Registration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
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
if(document.form1.t8.value.indexOf("@")==-1|| document.form1.t8.value.indexOf(".")==-1)
{
alert("Invalid Email");
return(false);

}

if(document.form1.t8.value.indexOf("@")==0)
{
alert("@ should not be the first char of email");
return(false);

}

if(document.form1.t8.value.indexOf(".")==0)
{
alert("dot(.) should not be the first char of email");
return(false);

}


}



</script>
<body>

<?php include ("p5.php"); ?>
<table align="center" width="489" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="489" height="70">&nbsp;</td>
  </tr>
  <tr>
    <td  height="499" valign="top">      <p align="center" class="style1">Staff Registration</p>      <form name="form1" onSubmit="return abc()" method="post" action="staffreg2.php">
        <div align="center">
          <table width="295" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="118">Name </td>
              <td width="171"><input name="t1" type="text" id="t1" onKeyPress="return alphabets(event)"></td>
            </tr>
            <tr>
              <td>House Name </td>
              <td><input name="t2" type="text" id="t2"></td>
            </tr>
            <tr>
              <td>Place</td>
              <td><input name="t3" type="text" id="t3"></td>
            </tr>
            <tr>
              <td>Pin Code </td>
              <td><input name="t4" type="text" id="t4" onKeyPress="return numbers(event)" maxlength="6"></td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><input name="t5" type="text" id="t5" onKeyPress="return numbers(event)" maxlength="13"></td>
            </tr>
            <tr>
              <td>State</td>
              <td><input name="t6" type="text" id="t6"></td>
            </tr>
            <tr>
              <td>District</td>
              <td><input name="t7" type="text" id="t7"></td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><input name="r1" type="radio" value="M" checked>
                Male 
                <input name="r1" type="radio" value="F">
                Female</td>
            </tr>
            <tr>
              <td>Email</td>
              <td><input name="t8" type="text" id="t8" onKeyPress="return email(event)" ></td>
            </tr>
            <tr>
              <td>Qualification</td>
              <td><input name="t9" type="text" id="t9"></td>
            </tr>
            <tr>
              <td>Date Of Birth </td>
              <td><input name="t10" type="date" id="t10"></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                  <input type="submit" name="Submit" value="Submit">
                  <input type="reset" name="Submit2" value="Reset">
              </div></td>
            </tr>
          </table>
        </div>
    </form>      <p align="center" class="style1">&nbsp;</p>      <p align="center" class="style1">&nbsp;</p></td>
  </tr>
  <tr>
    <td height="25">&nbsp;</td>
  </tr>
</table>
</body>
</html>
