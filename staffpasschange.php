<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form2.t2.value.length<10)
{
alert("please enter atleast 10 digits for phone");
return(false);

}


}



</script>
</head>

<body>
<?php include("p3.php");  ?>
<table width="1029" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="558" height="94">&nbsp;</td>
    <td width="471">&nbsp;</td>
  </tr>
  <tr>
    <td height="194">&nbsp;</td>
    <td valign="top"><form name="form1" method="post" onSubmit="return abc()" action="staffpasschange1.php">
        <div align="center"><span class="style1">Change Password </span>
        </div>
        <table width="340" height="91" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <th width="155" scope="col"><div align="left">Old Password </div></th>
            <th width="173" scope="col"><div align="left">
                <input name="t1" type="password" id="t1">
            </div></th>
          </tr>
          <tr>
            <td><div align="left"><strong>New Password </strong></div></td>
            <td>
              <div align="left">
                <input name="t2" type="password" id="t2">
            </div></td>
          </tr>
          <tr>
            <td height="29"><div align="left"><strong>Retype Password</strong></div></td>
            <td><div align="left">
                <input name="t3" type="password" id="t3">
            </div></td>
          </tr>
          <tr>
            <td height="29" colspan="2"><div align="center">
              <input type="submit" name="Submit" value="Submit">
              <input type="reset" name="Submit2" value="Reset">
            </div></td>
          </tr>
        </table>
        <p>&nbsp;</p>
    </form></td>
  </tr>
  <tr>
    <td height="216">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
