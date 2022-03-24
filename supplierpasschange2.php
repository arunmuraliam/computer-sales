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
</head>

<body>
<?php include("p4.php");  ?>
<table width="1149" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="541" height="108">&nbsp;</td>
    <td width="608">&nbsp;</td>
  </tr>
  <tr>
    <td height="223">&nbsp;</td>
    <td valign="top"><form name="form1" method="post" action="supplierpasschange2.php">
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
          <tr>
            <td height="29" colspan="2">
			<?php
				include("connection.php");
				session_start();
				$supid=$_SESSION["supid"];
				$s1=$_POST["t1"];
				$s2=$_POST["t2"];
				
				$s=mysql_query("select * from login where userid='$supid' and password='$s1'");
				if(mysql_num_rows($s)==0)
				{
					echo "<b><font color='red'>Invalid old password";
				}
				else
				{
					$s="update login set password='$s2' where userid='$supid'";
					mysql_query($s);
					echo "<b><font color='green'>Password Changed";
				}
				
			?>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
    </form></td>
  </tr>
  <tr>
    <td height="202">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
