<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="header.css">
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
<?php include("p2.php");  ?>
<table align="center" width="528" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="28" height="63">&nbsp;</td>
    <td width="489">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td height="499">&nbsp;</td>
    <td valign="top"><p align="center" class="style1"><?php
				include("connection.php");
				session_start();
				$cusid=$_SESSION["cusid"];
				
				
				$s=mysql_query("select * from customer where cusid='$cusid' ");
				$row=mysql_fetch_array($s);
				if(mysql_num_rows($s)==0)
				{
					echo "<b><font color='red'> Error";
				}
				
				
				
			?>
     <br><br> My Profile </p>      
      <form name="form1" method="post" action="">
       
        <div align="center">
          <table width="315" border="0" cellpadding="0" cellspacing="0" >
            <!--DWLayoutTable-->
		        
          <tr>
              <td width="155">Name </td>
              <td width="160"><?php echo $row[1];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>House Name </td>
              <td><?php echo $row[2];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Place</td>
              <td><?php echo $row[3];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Pin Code </td>
              <td><?php echo $row[4];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><?php echo $row[5];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Location</td>
              <td><?php echo $row[6];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>State</td>
              <td><?php echo $row[7];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>District</td>
              <td><?php echo $row[8];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Password</td>
              <td><?php echo $row[9];  ?>&nbsp;</td>
            </tr>
			<tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td><button><a href="customerpasschange1.php">Change Password</a></button></td>
              <td><button><a href="editcusprofile1.php">Edit Profile</a></button></td>
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
