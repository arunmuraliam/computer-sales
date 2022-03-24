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
<?php include("p2.php");  ?>
<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="72" height="45">&nbsp;</td>
    <td width="250">&nbsp;</td>
    <td width="102">&nbsp;</td>
    <td width="17">&nbsp;</td>
    <td width="278">&nbsp;</td>
    <td width="21">&nbsp;</td>
    <td width="286">&nbsp;</td>
    <td width="42">&nbsp;</td>
    <td width="115">&nbsp;</td>
    <td width="180">&nbsp;</td>
    <td width="263">&nbsp;</td>
  </tr>
  <tr>
    <td height="157">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="7" valign="top"><div align="center">
        <p class="style1">Old Product Payment Details </p>
        <form name="form1" method="post" action="oldprdpaymentview2.php">
		 <?php
		  	include("connection.php");
			$reqno=$_POST["c1"];
			
			session_start();
			$cusid=$_SESSION["cusid"];
			$s=mysql_query("select * from oldsalereq where custid='$cusid' and reqno in(select reqno from custsendreceiveproduct)");
			if(mysql_num_rows($s)==0)
			{
				echo "<b>No Sale Request Found";
			} 
			else
			{
		   ?>
          <table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		   
              <td width="181">Select Request No </td>
              <td width="102"><select name="c1" id="c1">
				    <option>Select </option>
				    <?php
						while($row=mysql_fetch_array($s)) 
						{
							echo "<option>$row[0]</option>";
						} 
					?>
              </select></td>
              <td width="136"><input type="submit" name="Submit" value="View"></td>
			  
            </tr>
		    
        </table>
		<?php
				}
			?>
        </form>
        <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="13"></td>
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
  <tr>
    <td height="34"></td>
    <td colspan="2" rowspan="2" valign="top"><p align="center" class="style1">
        <?php 
	$s=mysql_query("select * from oldsalereq where reqno='$reqno'");
	
	$row=mysql_fetch_array($s);
	$reqdate=$row[2];
	$cusid=$row[1];
	
	$ss=mysql_query("select * from customer where cusid='$cusid'");
	$row1=mysql_fetch_array($ss);
	
	$sss=mysql_query("select * from custsendreceiveproduct where reqno='$reqno'");
	
	$row2=mysql_fetch_array($sss);
	$smode=$row2[1];
	$sdetails=$row2[2];
	$sdate=$row2[3];
	$rstatus=$row2[4];
	$rdetails=$row2[5];
	$rdate=$row2[6];
	$staffid=$row2[7];
	$paydate=$row2[8];
	
	$paydetails=$row2[9];
	
	?>
        </p>      <p align="center" class="style1">Details</p>      <table width="281" border="1" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="130">Request Date </td>
          <td width="145"><?php echo "$reqdate"; ?></td>
        </tr>
        <tr>
          <td>Send Mode </td>
          <td><?php echo "$smode"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Send Details </td>
          <td><?php echo "$sdetails"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Send Date</td>
          <td><?php echo "$sdate"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>Staff ID </td>
          <td><?php echo "$staffid"; ?>&nbsp;</td>
        </tr>
                      </table>      <div align="center"></div>      <p align="center" class="style1">&nbsp;      </p></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="287">&nbsp;</td>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><div align="center">
      <p class="style1">Products</p>
      <p class="style1">
        <?php
				
				
						$s=mysql_query("select * from oldsaleitems where reqno=$reqno");
						
						echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					
					<th>Model</th>
					
					<th>Quantity</th>
					
					
				</tr>";
			while($row=mysql_fetch_array($s))		
			{
				echo "<tr>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
						<td>$row[4]</td>
						
						
					</tr>";
					
				
			}
		echo "</table>";
						
						
		   
			  	
			  ?>
      </p>
    </div></td>
    <td>&nbsp;</td>
	
	<?php 
	
	if($rstatus==null)
	{
		echo "No received...Please Wait...";	
	}
	else
	{
	
	?>
		
    <td rowspan="2" valign="top"><div align="center">
      <p class="style1">Receive Details </p>
      <table width="257" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="122">Receive Status </td>
          <td width="129"><?php echo "$rstatus"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">Details</div></td>
          </tr>
        <tr>
          <td colspan="2"><div align="center">
            <form name="form2" method="post" action="">
              <textarea name="textarea"><?php echo "$rdetails"; ?></textarea>
            </form>
          </div></td>
          </tr>
        <tr>
          <td>Receive Date </td>
          <td><?php echo "$rdate"; ?>&nbsp;</td>
        </tr>
      </table>
      <p><strong></strong></p>
    </div></td>
	<?php
	}
	?>
    <td>&nbsp;</td>
	
	
	
    <td colspan="2" valign="top">
	<?php
	if($rstatus=='y')
	{
		if($paydate==null)
		{
			echo "Not Paid ....Please Wait....";
		}
		else
		{
	?>
	
	<div align="center">
      <p class="style1">Payment Details </p>
      <table width="234" height="100" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <td width="120">Pay Date </td>
          <td width="108"><?php echo "$paydate"; ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">Details</div></td>
          </tr>
        <tr>
          <td colspan="2"><div align="center">
            <form name="form3" method="post" action="">
              <textarea name="textarea2"><?php echo "$paydetails"; ?></textarea>
            </form>
          </div>
		  <?php
		  	}
		  }	
		  ?>
		  </td>
		  
		  
          </tr>
      </table>
      <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
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
    <td height="120">&nbsp;</td>
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
</table>
</body>
</html>
