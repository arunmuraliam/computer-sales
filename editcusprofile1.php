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
      <form name="form1" method="post" action="editcusprofile2.php">
       
        <div align="center">
          <table width="315" border="0" cellpadding="0" cellspacing="0" >
            <!--DWLayoutTable-->
		        
          <tr>
              <td width="155">Name </td>
              <td width="160"><?php echo $row[1];  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>House Name </td>
              <td><input name="t1" type="text" value="<?php echo $row[2];  ?>" id="t1"></td>
            </tr>
            <tr>
              <td>Place</td>
              <td><input name="t2" type="text" value="<?php echo $row[3];  ?>" id="t2"></td>
            </tr>
            <tr>
              <td>Pin Code </td>
              <td><input name="t3" type="text" value="<?php echo $row[4];  ?>" id="t3"></td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><input name="t4" type="text" value="<?php echo $row[5];  ?>" id="t4"></td>
            </tr>
            <tr>
              <td>Location</td>
              <td><input name="t5" type="text" value="<?php echo $row[6];  ?>" id="t5"></td>
            </tr>
            <tr>
              <td>State</td>
              <td><input name="t6" type="text" value="<?php echo $row[7];  ?>" id="t6"></td>
            </tr>
            <tr>
              <td>District</td>
              <td><input name="t7" type="text" value="<?php echo $row[8];  ?>" id="t7"></td>
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
              <td><input name="Submit" type="submit" value="Update Profile" id="Submit"></td>
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
