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
-->
</style>
</head>

<body>
<?php include("p5.php"); ?>
<table width="1646" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="30" height="34">&nbsp;</td>
    <td width="388">&nbsp;</td>
    <td width="58">&nbsp;</td>
    <td width="13">&nbsp;</td>
    <td width="646">&nbsp;</td>
    <td width="340">&nbsp;</td>
    <td width="171">&nbsp;</td>
  </tr>
  <tr>
    <td height="49">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" valign="top"><div align="center"><span class="style3">Order To Supplier </span></div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="484">&nbsp;</td>
    <td colspan="2" rowspan="2" valign="top"><p align="center" class="style1">Selected Items</p>      <p>
        <?php
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
    <td colspan="2" valign="top"><p align="center" class="style1">Select Supplier</p>      <p>
        <?php
		
		include('connection.php');
		$s=mysql_query("select * from supplier" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Supplier";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Supplier ID</th>
						<th>Supplier Name</th>
						<th>Firm Nmae</th>
						<th>Firm Address</th>
						<th>Location</th>
						<th>Place</th>
						<th>Pin Code</th>
						<th>Phone</th>
						<th>State</th>
						<th>District</th>
						<th>Email</th>
						<th>Select</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
						<td>$row[4]</td>
						<td>$row[5]</td>
						<td>$row[6]</td>
						<td>$row[7]</td>
						<td>$row[8]</td>
						<td>$row[9]</td>
						<td>$row[10]</td>
						<td align='center'>
							<form action='suporder5.php' method='post'>
								<input  type='submit' value='Order'>
								<input type='hidden' name='t1' value='$row[0]'>
							</form
						</td>
					</tr>";
			}	
			echo "</table>";	
		}
	?> 
    </p></td>
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
    <td height="78"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
