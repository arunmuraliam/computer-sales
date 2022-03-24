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
<?php include("p2.php");  ?>
<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="96" height="59">&nbsp;</td>
    <td width="226">&nbsp;</td>
    <td width="111">&nbsp;</td>
    <td width="114">&nbsp;</td>
    <td width="392">&nbsp;</td>
    <td width="33">&nbsp;</td>
    <td width="211">&nbsp;</td>
    <td width="116">&nbsp;</td>
    <td width="327">&nbsp;</td>
  </tr>
 
  <tr>
    <td height="121">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" valign="top"><div align="center">
        <p class="style1">Check My Order Status </p>
        <form name="form1" method="post" action="custorderstatus2.php">
          <table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		    <?php
			$s1=$_POST["c1"];
		  	include("connection.php");
			session_start();
			$cusid=$_SESSION["cusid"];
			$s=mysql_query("select * from ordermaster where cusid='$cusid'");
			$row1=mysql_fetch_array($s);
			$date=$row1[4];
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
    <td colspan="2" rowspan="2" valign="top"><div align="center">
        <p class="style1">Order Details </p>
        <table width="273" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td>Order No </td>
            <td><?php echo "$s1";?>&nbsp;</td>
          </tr>
          <tr>
            <td>Order Date </td>
            <td><?php echo "$date";?>&nbsp;</td>
          </tr>
          
      </table>
        <p class="style1">&nbsp;</p>
    </div></td>
    <td></td>
    <td rowspan="2" valign="top"><div align="center">
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
					
					
			}
			echo "</table>";
	  ?>
  </p>
    </div></td>
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
    <td height="339"></td>
    <td>&nbsp;</td>
    <td></td>
    <td colspan="2" rowspan="2" valign="top"><div id="Layer4" style="position:absolute; left:1043px; top:392px; width:353px; height:262px; z-index:4">
        <div align="center" class="style1">
  	      <?php
			$s=mysql_query("select * from delivery where ordno=$s1");
			if(mysql_num_rows($s)==0)
			{
				echo "<b>Not Delivered...Please wait";
			}
			else
			{
				if($row1=mysql_fetch_array($s))
				{
					$ddate=$row1[1];
					$dmode=$row1[2];
					$ddetails=$row1[3];
				}	
	
		 ?>
          <p>Delivery</p>
          <form name="form1" method="post" action="custdelivery3.php">
            <table width="341" border="1" cellspacing="0" cellpadding="0">
		    <tr>
                <td width="128"><span class="style4">Delivery Mode </span></td>
                <td width="207"><?php echo "$dmode"; ?></td>
              </tr>
              
            <tr>
                <td><span class="style4">Delivery Details</span></td>
                <td><textarea name="t2" id="t2"><?php echo "$ddetails"; ?></textarea></td>
              </tr>
              <tr>
                <td width="128"><span class="style4">Date </span></td>
                <td width="207"><?php echo "$ddate"; ?></td>
              </tr>
                
			  	<?php
				}
				?>
			    
			 
              
          </table>
            <?php
		echo "<input type='hidden' name='c1' value='$s1'>";
		?>
          </form>
          <p>&nbsp;</p>
        </div>
    </div></td>
    <td></td>
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
    <td height="91"></td>
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
