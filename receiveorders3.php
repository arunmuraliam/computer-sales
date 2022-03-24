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
.style1 {font-size: 20px}
.style3 {font-size: 24px}
.style4 {font-size: 18px}
.style5 {	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<?php include("p3.php");  ?>
<?php
$s1=$_POST["c1"];
?>  
<div id="Layer1" style="position:absolute; left:460px; top:140px; width:676px; height:179px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p class="style3">Delivered Products</p>
	<form name="form1" method="post" action="receiveorders2.php">
	<?php
	
	include("connection.php");
				session_start();
				$staffid=$_SESSION["staffid"];
				$s=mysql_query("select * from delivery where rdate is null");
				if(mysql_num_rows($s)==0)
				{
					echo "<b>No orders waiting for delivery";
				}
				else
				{
	?>
    <table width="447" height="63" border="1" cellpadding="0" cellspacing="0">
	
      <tr>
        <td width="199"><span class="style1">Select Order </span></td>
        <td width="129">
          <select name="c1" id="c1" disabled>
		  	
		  	<?php 
			 
				include("connection.php");
				$s=mysql_query("select * from delivery where rdate is null");
				echo "<option>$s1</option>";
				while($row=mysql_fetch_array($s))
				{
					echo "<option>$row[0]</option>";
				}
			?>
			
          </select>
        </td>
        <td width="111">
          <input name="Submit" type="submit" id="Submit" value="View">
        </td>
      </tr>
	
    </table>
	<?php
	}
	?>
	</form>
    <p>&nbsp;</p>
  </div>
</div>
<div align="center">
  <div id="Layer3" style="position:absolute; left:29px; top:332px; width:312px; height:222px; z-index:3; font-size: 24px; font-weight: bold;">
    <div align="center">
      <p>Order  Details </p>
      <?php
	  include("connection.php");
	  		$s=mysql_query("select * from ordermaster where ordno='$s1'");
			$row=mysql_fetch_array($s);
			$supid=$row[1];
	  ?>
      <table width="198" height="60" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th width="97" scope="row"><div align="left"><span class="style4">Order No </span></div></th>
          <td width="97"><?php echo "$s1"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left" class="style4">Supplier ID </div></th>
          <td><?php echo "$row[1]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style4">Staff ID </span></div></th>
          <td><?php echo "$row[3]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left" class="style4">Order Date </div></th>
          <td><?php echo "$row[4]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style4">Total</span></div></th>
          <td><?php echo "$row[5]"; ?>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </div>
  </div>
  <div id="Layer5" style="position:absolute; left:325px; top:331px; width:320px; height:375px; z-index:5; font-weight: bold; font-size: 24px;">
    <p>Order Items </p>
    <p><span class="style5">
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
    </span> </p>
  </div>
  <div style="position:absolute; left:741px; top:331px; width:411px; height:416px; z-index:2; font-weight: bold; font-size: 24px;">
    <div align="center">
      <p>Supplier Deatails </p>
      
        <table width="318" height="322" border="1" align="center" cellpadding="0" cellspacing="0">
          <?php
			$s=mysql_query("select * from supplier where supid='$supid'");
			$row=mysql_fetch_array($s);
		
		?>
          <tr>
            <td width="131" height="31"><div align="left" class="style3 style4">
                <div align="left">Supplier Name</div>
            </div></td>
            <td width="175"><?php echo "$supid"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left" class="style4">
                <div align="left">Firm Name </div>
            </div></td>
            <td><?php echo "$row[2]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Firm Address </span></div></td>
            <td><?php echo "$row[3]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Location</span></div></td>
            <td><?php echo "$row[4]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Place</span></div></td>
            <td><?php echo "$row[5]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Pin Code </span></div></td>
            <td><?php echo "$row[6]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Phone</span></div></td>
            <td><?php echo "$row[7]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">State</span></div></td>
            <td><?php echo "$row[8]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">District</span></div></td>
            <td><?php echo "$row[9]"; ?>&nbsp; </td>
          </tr>
          <tr>
            <td><div align="left"><span class="style4">Email</span></div></td>
            <td><?php echo "$row[10]"; ?>&nbsp; </td>
          </tr>
        </table>
        
     
      <p>&nbsp;</p>
    </div>
  </div>
  
  <div id="Layer4" style="position:absolute; left:1138px; top:330px; width:353px; height:262px; z-index:4">
    <div align="center" class="style5">
      <p>Delivery</p>
      <?php
			$s=mysql_query("select * from delivery where ordno='$s1'");
			$row=mysql_fetch_array($s);
		
		?>
      <form name="form1" method="post" action="receiveorders3.php">
        <table width="341" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="128"><span class="style4">Delivery Date </span></td>
            <td width="207"><?php echo "$row[1]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style4">Delivery Mode </span></td>
            <td><?php echo "$row[2]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style4">Delivery Details </span></td>
            <td><textarea name="textarea"><?php echo "$row[3]"; ?></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
			<?php
				$rdate=date("y")."-".date("m")."-".date("d");
			 	$q=mysql_query("update delivery set rdate='$rdate',staffid='$staffid' where ordno='$s1'"); 
				
				$s=mysql_query("select * from orderitems where ordno='$s1'");
				while($row=mysql_fetch_array($s))
				{
					$newpid=$row[1];
					$qty=$row[2];
					$ss=mysql_query("select * from newstock where newpid='$newpid'");
					if(mysql_num_rows($ss)==0)
					{
						$sss="insert into newstock values('$newpid',$qty)";
					}
					else
					{
						$sss="update newstock set cstock=cstock+$qty where newpid='$newpid'";
					}
					mysql_query($sss);
				}
				
				
					echo "<b>Delivery Received</b>";
				
			?>
            </div></td>
          </tr>
        </table>
        <?php
		echo "<input type='hidden' name='c1' value='$s1'>";
		?>
      </form>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
</body>
</html>
