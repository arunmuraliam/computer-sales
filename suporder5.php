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
.style3 {font-size: 28px; font-weight: bold; }
.style5 {font-size: 20px}
-->
</style>
</head>

<body>
<?php include("p5.php"); ?>
<table width="1646" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="152" height="49">&nbsp;</td>
    <td width="266">&nbsp;</td>
    <td width="141">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="563">&nbsp;</td>
    <td width="340">&nbsp;</td>
    <td width="171">&nbsp;</td>
  </tr>
  <tr>
    <td height="49"></td>
    <td></td>
    <td colspan="3" valign="top"><div align="center"><span class="style3">Order To Supplier </span></div></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="4"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="484">&nbsp;</td>
    <td colspan="2" rowspan="2" valign="top"><p align="center" class="style1">Selected Items</p>      <p>
        <?php
		$s1=$_POST["t1"];
		include('connection.php');
		$s=mysql_query("select * from temp");
		
		echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Product Type</th>
					<th>Quantity</th>
				</tr>";
			while($row=mysql_fetch_array($s))		
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
						<td>$row[4]</td>
					</tr>";
				
			}
		echo "</table>";	
		
		 
	?> 
        </p></td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><p align="center" class="style1">Selected Supplier</p>      <table width="357" border="1" align="center" cellpadding="0" cellspacing="0">
	    <?php 
		$s = mysql_query("select * from supplier where supid='$s1'");
		$row=mysql_fetch_array($s);
	?>
        <tr>
          <td width="127"><span class="style5">Supplier ID </span></td>
          <td width="138"><?php echo "$s1"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Supplier Name</span></td>
          <td><?php echo "$row[1]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Firm Name</span></td>
          <td><?php echo "$row[2]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Firm Address </span></td>
          <td><?php echo "$row[3]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Location</span></td>
          <td><?php echo "$row[4]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Place</span></td>
          <td><?php echo "$row[5]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Pin Code </span></td>
          <td><?php echo "$row[6]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Phone</span></td>
          <td><?php echo "$row[7]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">State</span></td>
          <td><?php echo "$row[8]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">District</span></td>
          <td><?php echo "$row[9]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style5">Email</span></td>
          <td><?php echo "$row[10]"; ?>&nbsp;</td>
        </tr>
        <?php  
	  	$ordno=100;
		$orddate = date("y")."-".date("m")."-".date("d");
		include("connection.php");
		$s=mysql_query("select * from ordermaster order by ordno desc");
			
		if($row=mysql_fetch_array($s))
		{
			$ordno=$row[0];
		}
		$ordno++;
		
		//session_start();
		//$staffid=$_SESSION["staffid"];
		$s= "insert into ordermaster(ordno,supid,orddate) values('$ordno','$s1','$orddate')";
		mysql_query($s);
		echo "Order placed";
	  ?>
        <tr>
          <td colspan="2"><?php 
							$s=mysql_query("select * from temp");
							while($row=mysql_fetch_array($s))
							{
								$ss="insert into orderitems values('$ordno','$row[1]','$row[4]')";
								mysql_query($ss);
							}
							echo "<b><font color='green'>Order send to the supplier. The order No is $ordno";
						?>&nbsp;</td>
        </tr>
          </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="14"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="59"></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
