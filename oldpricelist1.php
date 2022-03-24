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

<table width="1167" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="449" height="33">&nbsp;</td>
    <td width="96">&nbsp;</td>
    <td width="472">&nbsp;</td>
    <td width="80">&nbsp;</td>
    <td width="70">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><div align="center" class="style1">Old Products Price List </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="45">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="376">&nbsp;</td>
    <td colspan="3" valign="top">
	<?php
	// To show old product details in the guest user page
		include('connection.php');
		
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
  </tr>
</table>
</body>
</html>
