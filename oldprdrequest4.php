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
<?php include("p2.php");  ?>
<table width="1500" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="14" height="33">&nbsp;</td>
    <td width="514">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="8">&nbsp;</td>
    <td width="229">&nbsp;</td>
    <td width="14">&nbsp;</td>
    <td width="225">&nbsp;</td>
    <td width="102">&nbsp;</td>
    <td width="12">&nbsp;</td>
    <td width="140">&nbsp;</td>
    <td width="60">&nbsp;</td>
    <td width="115">&nbsp;</td>
    <td width="36">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" valign="top"><div align="center" class="style1">Old Products Price List </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="16"></td>
    <td colspan="2" rowspan="6" valign="top">
	<?php
		include('connection.php');
		session_start();
		$cusid=$_SESSION["cusid"];
				
		$pid=$_POST["t1"];
		$model=$_POST["t2"];
		$qty=$_POST["t3"];
		
		
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
							<form action='oldprdrequest2.php' method='post'>
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
  <td></td>
    <td rowspan="5" valign="top">
	
	
	  <table width="229" height="253" border="1" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
        <tr>
          <td width="3" height="33">&nbsp;</td>
          <td width="188" valign="top" scope="row"><?php
		
	    $s=mysql_query("select * from oldproductreg where oldpid='$pid'" );
		$row=mysql_fetch_array($s);
		$ppic=$row[3];
		
		echo "<img src='./oldprdpic/$row[3]' width='150' height='150'>";
	
	?>            &nbsp;</td>
          <td width="17">&nbsp;</td>
        </tr>
        <tr>
          <td height="74"></td>
          <td valign="top" scope="row"><span class="style3">Product Specifications</span> &nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="144"></td>
          <td colspan="2" valign="top" scope="row"><textarea><?php echo $row[4]; ?></textarea>            &nbsp;</td>
        </tr>
        
      </table></td>
    <td></td>
    <td colspan="2" rowspan="6" valign="top"><div align="center">
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
					<th>Select</th>
				</tr>
				";
		while($row=mysql_fetch_array($s))
		{
			
			//$ss=mysql_query("select * from oldacchild where oldpid='$pid' ");
	
		
			
		
		echo "<tr>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
					<td align='center'>
							<form action='oldprdrequest3.php' method='post'>
								<input  type='submit' value='view'>
								<input type='hidden' name='t1' value='$pid'>
								<input type='hidden' name='t2' value='$row[1]'>
							</form
						</td>
					</tr>";
			}
			
			echo "</table>";
	  ?></p>
    </div></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  </tr>
  <tr>
    <td height="41"></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="2" valign="top"><form action="oldprdrequest4.php">
		<p>Quantity : <?php echo $qty ?>        </p>
	</form></td>
  <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="60"></td>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="3" valign="top"> <?php
		   		$s = mysql_query("select * from temp2 where model='$model'"); //check
				if(mysql_num_rows($s)>0)
				{
					echo "This product already selected";
				}
				else
				{
					$itemno=0;
					$s=mysql_query("select * from temp2 order by itemno desc");
			
					if($row=mysql_fetch_array($s))
					{
						$itemno=$row[0];
					}
					$itemno++; 
					
					$ss=mysql_query("select * from oldproductreg where oldpid='$pid'");
					$row1=mysql_fetch_array($ss);
					$pname=$row1[1];
					
					$s1=mysql_query("select * from oldacchild where oldpid='$pid' and model='$model'");
					$row2=mysql_fetch_array($s1);
					$pprice=$row2[2];
					
					$total=$pprice*$qty;
				
					$s="insert into temp2 values('$itemno','$pid','$pname','$model','$pprice','$qty','$total')";
					
					if(mysql_query($s))
					{
						$s=mysql_query("select * from temp2");
						
						echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Model</th>
					<th>Purchase Price</th>
					<th>Quantity</th>
					
					<th>Total</th>
				</tr>";
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
						
					</tr>";
					
				
			}
		echo "</table>";
						
						
					}
					else
					{
						echo "Item not added";
					}
				}
		   
			  	
			  ?>      &nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33"></td>
    <td></td>
    <td></td>
    <td></td>
    <td valign="top"><form name="form1" method="post" action="oldprdrequest5.php">
        <input type="submit" name="Submit" value="Sale Request">
    </form></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="103"></td>
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="149"></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="104"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
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
