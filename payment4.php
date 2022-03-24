<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>
<style type="text/css">
<!--
.style3 {font-size: 18px}
.style1 {	font-size: 24px;
	font-weight: bold;
}
.style4 {font-size: 24px}
-->
</style>
</head>
<body>
<?php include("p5.php"); ?>
<div id="Layer2" style="position:absolute; left:114px; top:134px; width:350px; height:474px; z-index:-2; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Order Details </p>
    <table width="278" height="397" border="1" cellpadding="0" cellspacing="0">
	<?php
		include('connection.php');
		$s1 = $_POST["t1"];	
		
		
		$s=mysql_query("select * from ordermaster where ordno='$s1'" );
		$row=mysql_fetch_array($s);
		
		$ss=mysql_query("select * from supplier where supid='$row[1]'" );
		$row1=mysql_fetch_array($ss)
	?>
      <tr>
        <td width="135"><span class="style3">Order No </span></td>
        <td width="137"><?php echo "$s1"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Order Date </span></td>
        <td><?php echo "$row[4]"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Total</span></td>
        <td><?php echo "$row[5]"; ?>&nbsp;</td>
      </tr>
	  
      <tr>
        <td colspan="2"><div align="center">Supplier Details </div></td>
      </tr>
      <tr>
        <td><span class="style3">Supplier ID </span></td>
        <td><?php echo "$row1[0]"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Supplier Name </span></td>
        <td><?php echo "$row1[1]"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Firm Name </span></td>
        <td><?php echo "$row1[2]"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Place</span></td>
        <td><?php echo "$row1[5]"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Phone</span></td>
        <td><?php echo "$row1[7]"; ?>&nbsp;</td>
      </tr>
    </table>
    <p>&nbsp;</p>
  </div>
</div>
<div id="Layer3" style="position:absolute; left:523px; top:132px; width:315px; height:465px; z-index:-3">
  <p align="center" class="style1">Ordered Items</p>
  <p><span class="style1">
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
		echo "<tr align='center'><td>$newpid</td>
					<td>$pname</td>
					<td>$ptype</td>
					<td>$qty</td></tr>";
			}
			echo "</table>";
	  ?>
  </span> </p>
</div>
<div id="Layer1" style="position:absolute; left:885px; top:135px; width:439px; height:423px; z-index:-1; font-weight: bold;">
  <div align="center" class="style4">
    <p>Bank Details </p>
	<form name="form2" method="post" action="payment5.php">
	<?php
		
		$s2=$_POST["t2"];
		$s3=$_POST["t3"];
		$s4=$_POST["t4"];
		$s5=$_POST["t5"];
		$s6=$_POST["t6"];
		$s7=$_POST["t7"];
	?>
      <table width="340" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <th width="127" scope="row"><div align="left"><span class="style3">Card No </span></div></th>
          <td width="207"><?php echo "$s2"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">Bank Name </span></div></th>
          <td><?php echo "$s3"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">CName</span></div></th>
          <td><?php echo "$s4"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">CVV</span></div></th>
          <td><?php echo "$s5"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">Expire Date </span></div></th>
          <td>            <span class="style3">
          <?php echo "$s6"; ?>  / 
            <?php echo "$s7"; ?>        </span></td>
        </tr>
        <tr>
          <?php
		  		$s=mysql_query("select * from bank where cardno='$s2' and bname='$s3' and cname='$s4' and cvv='$s5' and month(expdate)='$s6' and year(expdate)='$s7'");
				if(mysql_num_rows($s)==0)
				{
					echo "<b>Invalid Bank Details";
				}
				else
				{
					$paydate=date("y")."-".date("m")."-".date("d");
					$s="insert into paytosupplier values('$s1','$s2','$paydate')";
					if(mysql_query($s))
					{
						echo "<b><font color='green'>Payment Successful";
					}
				}
		  ?>
        </tr>
      </table>
	</form>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
