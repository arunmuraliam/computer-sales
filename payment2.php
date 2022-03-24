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
.style4 {font-size: 20px}
-->
</style>
</head>
<body>
<?php include("p5.php"); ?>
<div id="Layer1" style="position:absolute; left:60px; top:146px; width:587px; height:467px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Payment To Supplier </p>
    
	<?php
		include('connection.php');
		$s1=$_POST['t1'];
		
		$s=mysql_query("select * from ordermaster where ordno not in (select ordno from paytosupplier) and total is not null" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Order No</th>
						<th>Supplier ID</th>
						<th>Order Date</th>
						<th>Select</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr align='center'>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[4]</td>
						<td align='center'>
							<form action='payment2.php' method='post'>
								<input  type='submit' value='More'>
								<input type='hidden' name='t1' value='$row[0]'>
							</form>
						</td>
					</tr>";
			}	
			echo "</table>";	
		}
	?>
  </div>
</div>
<div id="Layer2" style="position:absolute; left:639px; top:142px; width:350px; height:474px; z-index:2; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Order Details </p>
    <table width="278" height="397" border="1" cellpadding="0" cellspacing="0">
	<?php
		include('connection.php');
		$s1 = $_POST["t1"];	
		
		$s=mysql_query("select * from ordermaster where ordno='$s1'" );
		$row=mysql_fetch_array($s);
		$cstatus=$row[3];
		
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
<div id="Layer3" style="position:absolute; left:990px; top:141px; width:315px; height:465px; z-index:3">
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
<div id="Layer4" style="position:absolute; left:1302px; top:220px; width:228px; height:111px; z-index:4; font-size: 18px; font-weight: bold;">
  <div align="center" class="style4">
    <form name="form1" method="post" action="payment3.php">
		<?php if($cstatus=="n") echo "This order is rejected by the supplier."; else {?><input type="submit" value="Payment Gateway">
		<?php
		}
			echo "<input type='hidden' name='t1' value='$s1'>";
		?>
    </form>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
