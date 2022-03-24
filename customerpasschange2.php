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

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form2.t5.value==""
||document.form2.t6.value==""||document.form1.t6.value==""||document.form1.t7.value==""||document.form1.t8.value==""||document.form1.t8.value==""||document.form1.t10.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t1.value.length<8)
{
alert("Password must be atleast 8 characters");
return(false);

}
if(document.form1.t2.value.length<8)
{
alert("Password must be atleast 8 characters");
return(false);

}
if(document.form1.t3.value.length<8)
{
alert("Password must be atleast 8 characters");
return(false);

}


}



</script>
</head>

<body>
<?php include("p2.php");  ?>
<table width="1152" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="491" height="113">&nbsp;</td>
    <td width="589">&nbsp;</td>
    <td width="72">&nbsp;</td>
  </tr>
  <tr>
    <td height="242">&nbsp;</td>
    <td valign="top"><form name="form1" method="post" onSubmit="return abc()" action="customerpasschange2.php">
        <div align="center">
          <p class="style1">Change Password</p>
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
          <tr>
            <td height="29" colspan="2">
			<?php
				include("connection.php");
				session_start();
				$cusid=$_SESSION["cusid"];
				$s1=$_POST["t1"];
				$s2=$_POST["t2"];
				
				$s=mysql_query("select * from login where userid='$cusid' and password='$s1'");
				if(mysql_num_rows($s)==0)
				{
					echo "<b><font color='red'>Invalid old password";
				}
				else
				{
					$s="update login set password='$s2' where userid='$cusid'";
					$s1="update customer set password='$s2' where cusid='$cusid'";
					mysql_query($s);
					mysql_query($s1);
					echo "<b><font color='green'>Password Changed";
				}
				
			?>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
    </form></td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="197">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
