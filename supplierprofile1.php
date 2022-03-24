<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
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

<?php
				include("connection.php");
				session_start();
				$staffid=$_SESSION["supid"];
				
				
				$s=mysql_query("select * from supplier where supid='$staffid' ");
				$row=mysql_fetch_array($s);
				if(mysql_num_rows($s)==0)
				{
					echo "<b><font color='red'> Error";
				}
				
				
				
			?>
<table align="center" width="528" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="28" height="63">&nbsp;</td>
    <td width="489">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td height="499">&nbsp;</td>
    <td valign="top">      <p align="center" class="style1">Staff Registration</p>      <form name="form1" method="post" action="">
       
        <div align="center">
          <table width="322" border="0" cellpadding="0" cellspacing="0" >
		        
          <tr>
              <td width="152">Name </td>
              <td width="170"><?php echo $row[1];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Firm Name </td>
              <td><?php echo $row[2];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Firm Address</td>
              <td><?php echo $row[3];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Location </td>
              <td><?php echo $row[4];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Place</td>
              <td><?php echo $row[5];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Pin</td>
              <td><?php echo $row[6];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><?php echo $row[7];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>State</td>
              <td><?php echo $row[8];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>District</td>
              <td><?php echo $row[9];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $row[10];  ?></td>
            </tr>
            
            <tr>
			<tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><button><a href="supplierpasschange1.php">Change Password</a></button></td>
              
            </tr>
          </table>
          
        </div>
    </form>      <p align="center" class="style1">&nbsp;</p>      <p align="center" class="style1">&nbsp;</p></td><td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
