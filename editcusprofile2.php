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
				
				$s1=$_POST["t1"];
				$s2=$_POST["t2"];
				$s3=$_POST["t3"];
				$s4=$_POST["t4"];
				$s5=$_POST["t5"];
				$s6=$_POST["t6"];
				$s7=$_POST["t7"];
				
				
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
              <td><?php echo $s1;  ?></td>
            </tr>
            <tr>
              <td>Place</td>
              <td><?php echo $s2;  ?></td>
            </tr>
            <tr>
              <td>Pin Code </td>
              <td><?php echo $s3;  ?></td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><?php echo $s4;  ?></td>
            </tr>
            <tr>
              <td>Location</td>
              <td><?php echo $s4;  ?></td>
            </tr>
            <tr>
              <td>State</td>
              <td><?php echo $s6;  ?></td>
            </tr>
            <tr>
              <td>District</td>
              <td><?php echo $s7;  ?></td>
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
              <td>
			  <?php
			  
			  $ss="update customer set hname='$s1',place='$s2',pin='$s3', ph='$s4',location='$s5',state='$s6',dist='$s7' where cusid='$cusid'";
			  if(mysql_query($ss))
			  {
			     echo "<b>Update Successful";
			  }
			  else
			  {
			   echo "Not Updated";
			  }
			  
			  ?></td>
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
