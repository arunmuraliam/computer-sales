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
.style3 {font-size: 20px; font-weight: bold; }
-->
</style>
</head>

<body>

<table width="1450" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="71" height="33">&nbsp;</td>
    <td width="490">&nbsp;</td>
    <td width="126">&nbsp;</td>
    <td width="23">&nbsp;</td>
    <td width="323">&nbsp;</td>
    <td width="25">&nbsp;</td>
    <td width="28">&nbsp;</td>
    <td width="364">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="3" valign="top"><div align="center" class="style1">Old Products Price List </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="376"></td>
    <td colspan="2" valign="top">
	<?php
		include('connection.php');
		
		$pid=$_POST["t1"];
		
		$s="delete from temp ";
		mysql_query($s);
		
		$s=mysql_query("select * from oldproductreg" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Old product ID</th>
						<th>Product name</th>
						<th>Type</th>
						<th>Select</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
			if($pid==$row[0])
			
				echo "<tr bgcolor='#aabbcc'>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td align='center'>
							<form action='oldpricelist2.php' method='post'>
								<input  type='submit' value='show details'>
								<input type='hidden' name='t1' value='$row[0]'>
							</form
						</td>
					</tr>";
					else
					echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td align='center'>
							<form action='oldpricelist2.php' method='post'>
								<input  type='submit' value='show details'>
								<input type='hidden' name='t1' value='$row[0]'>
							</form
						</td>
					</tr>";
					
			}	
			echo "</table>";	
		}
	?>
	
	&nbsp;</td>
  <td>&nbsp;</td>
    <td colspan="2" valign="top">
	
	
	<table width="289" height="253" border="1" cellpadding="0" cellspacing="0">
      <tr>
        <th scope="row"><?php
		
	    $s=mysql_query("select * from oldproductreg where oldpid='$pid'" );
		$row=mysql_fetch_array($s);
		$ppic=$row[3];
		
		echo "<img src='./oldprdpic/$row[3]' width='150' height='150'>";
	
	?>&nbsp;</th>
      </tr>
      <tr>
        <th height="56" scope="row"><span class="style3">Product Specifications</span> &nbsp;</th>
      </tr>
      <tr>
        <th scope="row"><textarea><?php echo $row[4]; ?></textarea>&nbsp;</th>
      </tr>
    </table>
	 </td>
    <td>&nbsp;</td>
    <td valign="top"><div align="center">
      <p><strong>Model Details </strong></p>
      <p>&nbsp;
	  <?php
	  	$s=mysql_query("select * from oldacchild where oldpid='$pid'");
		echo "<table width='100%' border='1'>
				<tr>
					
					<th>Model</th>
					<th>Purchase Price</th>
					<th>Sale Price</th>
					<th>Details</th>
				</tr>
				";
		while($row=mysql_fetch_array($s))
		{
			
		
		echo "<tr>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td></tr>";
			}
			
			echo "</table>";
	  ?></p>
    </div></td>
  </tr>
  <tr>
    <td height="17"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
