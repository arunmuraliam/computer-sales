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
<?php include("p4.php");  ?>
<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="96" height="59">&nbsp;</td>
    <td width="226">&nbsp;</td>
    <td width="111">&nbsp;</td>
    <td width="31">&nbsp;</td>
    <td width="392">&nbsp;</td>
    <td width="33">&nbsp;</td>
    <td width="294">&nbsp;</td>
    <td width="282">&nbsp;</td>
    <td width="161">&nbsp;</td>
  </tr>
  <tr>
    <td height="121">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" valign="top"><div align="center">
        <p class="style1">New Order Rate Entry </p>
        <form name="form1" method="post" action="suprateentry2.php">
          <table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		    <?php
			$s1=$_POST["c1"];
			$s2=$_POST["t1"];
			$s3=$_POST["r1"];
		  	include("connection.php");
			session_start();
			$supid=$_SESSION["supid"];
			$s=mysql_query("select * from ordermaster where supid='$supid' and total is null");
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
    <td></td>
    <td></td>
  </tr>
  <tr>
  <?php
  	
	include("connection.php");
	$s=mysql_query("select * from ordermaster where ordno='$s1'"); 
	$row=mysql_fetch_array($s);
	
  ?>
    <td height="39"></td>
    <td colspan="2" rowspan="3" valign="top"><div align="center">
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
        <!--<tr>
          <td>Staff ID </td>
          <td><?php echo "$row[3]";?>&nbsp;</td>
        </tr>-->
      </table>
      <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td rowspan="3" valign="top"><div align="center">
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
					<td>$qty</td>
					<td>$pname</td>
					<td>$ptype</td></tr>";
			}
			echo "</table>";
	  ?>
</p>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="122"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><table width="433" border="1" cellspacing="0" cellpadding="0">
      <!--DWLayoutTable-->
      <tr>
        <td width="177" height="39">Confirm Status </td>
        <td width="250" valign="top"> <?php echo "$s3"; ?></td>
      </tr>
      <tr>
        <td height="39">Total Amount</td>
        <td valign="top"><?php echo "$s2"; ?></td>
      </tr>
      <tr>
        <td height="39" colspan="2"><div align="center">
            <?php
		  	$s="update ordermaster set total=$s2, cstatus='$s3' where ordno=$s1";
			if(mysql_query($s))
			{
				echo "<b>Done";
			}
			else
			{
				echo "Unsend";
			}
			
		  ?>
        </div></td>
      </tr>
    </table>      </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="195"></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
