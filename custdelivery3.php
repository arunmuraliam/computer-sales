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
.style4 {font-size: 18px}
-->
</style>
</head>

<body>
<?php include("p3.php");  ?>

<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="96" height="59">&nbsp;</td>
    <td width="226">&nbsp;</td>
    <td width="111">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="392">&nbsp;</td>
    <td width="327">&nbsp;</td>
    <td width="443">&nbsp;</td>
  </tr>
 
  <tr>
    <td height="121">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" valign="top"><div align="center">
        <p class="style1">Customer Orders </p>
        <form name="form1" method="post" action="custdelivery2.php">
          <table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		    <?php
			$s1=$_POST["c1"];
		  	include("connection.php");
			session_start();
			$staffid=$_SESSION["staffid"];
			$s=mysql_query("select * from ordermaster where ordno not in (select ordno from delivery) and cusid is not null");
			if(mysql_num_rows($s)==0)
			{
				echo "<b>No Orders";
			} 
			else
			{
		  ?>
              <td width="181">Select Order No </td>
              <td width="102"><select name="c1" id="c1">
                
                <?php
				echo "<option>$s1</option>";
						while($row=mysql_fetch_array($s)) 
						{
						if($s1==$row[0])
						  continue;
							echo "<option>$row[0]</option>";
						} 
					?>
              </select></td>
              <td width="136"><input type="submit" name="Submit" value="View"></td>
			  <?php
				}
			?>
            </tr>
		    
        </table>
        </form>
        <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="17"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
  <?php
  	
	include("connection.php");
	$s=mysql_query("select * from ordermaster where ordno='$s1'"); 
	$row=mysql_fetch_array($s);
	$custid=$row[2];
	
	$cusdetails=mysql_query("select * from customer where cusid='$custid'");
	if($row1=mysql_fetch_array($cusdetails))
	{
	$custname=$row1[1];
	$hname=$row1[2];
	$place=$row1[3];
	$pin=$row1[4];
	$ph=$row1[5];
	$location=$row1[6];
	$state=$row1[7];
	$district=$row1[8];
	
	}
	
  ?>
    <td height="356"></td>
    <td colspan="2" valign="top"><div align="center">
      <p class="style1">Order Details </p>
      <table width="273" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td>Order No </td>
          <td><?php echo "$s1";?>&nbsp;</td>
        </tr>
        <tr>
          <td>Order Date </td>
          <td><?php echo "$row[4]";?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center"><strong>Customer Details </strong></div></td>
          </tr>
        <tr>
          <td>Customer ID </td>
          <td><?php echo "$custid";?>&nbsp;</td>
        </tr>
        <tr>
          <td>Customer Name</td>
          <td><?php echo "$custname";?>&nbsp;</td>
        </tr>
        <tr>
          <td>House Name</td>
          <td><?php echo "$hname";?>&nbsp;</td>
        </tr>
        <tr>
          <td>Place</td>
          <td><?php echo "$place";?>&nbsp;</td>
        </tr>
        <tr>
          <td>Pin</td>
          <td><?php echo "$pin";?>&nbsp;</td>
        </tr>
        <tr>
          <td>Phone</td>
          <td><?php echo "$ph";?>&nbsp;</td>
        </tr>
        <tr>
          <td>Location</td>
          <td><?php echo "$location";?>&nbsp;</td>
        </tr>
        <tr>
          <td>State</td>
          <td><?php echo "$state";?>&nbsp;</td>
        </tr>
        <tr>
          <td>District</td>
          <td><?php echo "$district";?>&nbsp;</td>
        </tr>
      </table>
      <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td valign="top"><div align="center">
      <p class="style1">Order Items
        <?php
	  	$s=mysql_query("select * from orderitems where ordno=$s1");
		echo "<table width='100%' border='1'>
				<tr>
					<th>New Product ID</th>
					<th>Product Name</th>
					<th>Product Type</th>
					<th>Quantity</th>
				</tr>
				";
		while($row=mysql_fetch_array($s))
		{
			$newpid=$row[1];
			$qty=$row[2];
			$ss=mysql_query("select * from newproductreg where newpid='$newpid' ");
	
		if($row1=mysql_fetch_array($ss))
		{
			$pname=$row1[1];
			$ptype=$row1[2];
		}	
		echo "<tr><td>$newpid</td>
					<td>$pname</td>
					<td>$ptype</td>
					<td>$qty</td></tr>";
					
					$ss="update newstock set cstock=cstock-$qty where newpid='$newpid'";
					mysql_query($ss);
					
					
					
			}
			echo "</table>";
	  ?>
</p>
    </div></td>
    <td><div id="Layer4" style="position:absolute; left:934px; top:405px; width:353px; height:262px; z-index:4">
      <div align="center" class="style1">
	  	 <?php
			

			$s2=$_POST["t1"];
			$s3=$_POST["t2"];
	
		 ?>
        <p>Delivery</p>
        <form name="form1" method="post" action="custdelivery3.php">
          <table width="341" border="1" cellspacing="0" cellpadding="0">
            <tr>
              <td width="128"><span class="style4">Delivery Mode </span></td>
              <td width="207"><?php echo "$s2"; ?></td>
            </tr>
            <tr>
              <td><span class="style4">Delivery Details</span></td>
              <td><textarea name="t2" id="t2"><?php echo "$s3"; ?></textarea></td>
            </tr>
            <tr>
              <td colspan="2">
			  	<?php 
					$ddate=date("y")."-".date("m")."-".date("d");
					$s="insert into delivery(ordno,ddate,dmode,ddetails,staffid) values('$s1','$ddate','$s2','$s3','$staffid')";
					if(mysql_query($s))
					{
							echo "<b>Delivered</b>";
					}
				?>
			  
			  &nbsp;</td>
            </tr>
          </table>
          <?php
		echo "<input type='hidden' name='c1' value='$s1'>";
		echo "<input type='hidden' name='c1' value='$s3'>";
		echo "<input type='hidden' name='c1' value='$s2'>";
		?>
        </form>
        <p>&nbsp;</p>
      </div>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="91"></td>
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
