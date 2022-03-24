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
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<?php include("p3.php");  ?>

  <!--DWLayoutTable-->
  <div id="Layer1" style="position:absolute; left:36px; top:171px; width:515px; height:401px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>New Product Countersale </p>
    
	<?php
		include('connection.php');
		session_start();
		$staffid=$_SESSION["staffid"];
		$s1=$_POST["t1"];
		$qty=$_POST["t2"];
		
		$s="delete from temp3 ";
		mysql_query($s);
		
		$s=mysql_query("select * from newproductreg where newpid in (select newpid from newstock where cstock>0)" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>New product ID</th>
						<th>Product Name</th>
						<th>Price</th>
						<th>Current Stock</th>
						<th>Select</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
			$ss=mysql_query("select * from newstock where newpid='$row[0]'");
		$row1=mysql_fetch_array($ss);
		$cstock=$row1[1];
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[3]</td>
						<td>$cstock</td>
						<td align='center'>
							<form action='newprdcountersale2.php' method='post'>
								<input type='submit' name='Submit' value='Next'>
								<input type='hidden' name='t1' value='$row[0]'>
								
							</form
						</td>
					</tr>";
			}	
			echo "</table>";	
		}
	?>
  </div>
</div>
  
  <table width="1633" border="0" cellpadding="0" cellspacing="0">
    <!--DWLayoutDefaultTable-->
    <tr>
      <td width="542" height="55">&nbsp;</td>
      <td width="368">&nbsp;</td>
      <td width="170">&nbsp;</td>
      <td width="431">&nbsp;</td>
      <td width="122">&nbsp;</td>
    </tr>
    <tr>
      <td height="122">&nbsp;</td>
      <td rowspan="4" valign="top"><div align="center">
        <p class="style1">Product Details </p>
        <table width="336" border="1" cellspacing="0" cellpadding="0">
		<?php
		$s=mysql_query("select * from newproductreg where newpid='$s1'");
		$row=mysql_fetch_array($s);
		$pname=$row[1];
		$pprice=$row[3];
		$gst=$row[4];
		$warranty=$row[5];
		$ppic=$row[6];
		$pspec=$row[7];
		
		$tax=$pprice*($gst/100);
		$price=$pprice+$tax;
		$total=$qty*$price;
		
		?>
          <tr>
            <td width="119">Product ID </td>
            <td width="217"><?php echo "$s1"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Product Name </td>
            <td><?php echo "$pname"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Price</td>
            <td><?php echo "$pprice"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>GST</td>
            <td><?php echo "$gst"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Warranty</td>
            <td><?php echo "$warranty"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Product Specs </td>
            <td>
              <textarea name="textarea"><?php echo "$pspec"; ?></textarea>
            </td>
          </tr>
          <tr>
            <td>Quantity</td>
            <td><?php echo "$qty"; ?>&nbsp;
</td>
          </tr>
          <tr>
		  
            <td><div align="left">Total</div></td>
            <td><?php echo "$total"; ?>&nbsp;</td>
          </tr>
		  <?php
		   		$s = mysql_query("select * from temp4 where newpid='$s1'");
				if(mysql_num_rows($s)>0)
				{
					echo "This product already selected";
				}
				else
				{
					$itemno=0;
					$s=mysql_query("select * from temp4 order by itemno desc");
			
					if($row=mysql_fetch_array($s))
					{
						$itemno=$row[0];
					}
					$itemno++; 
					
				
					$s="insert into temp4 values('$itemno','$s1','$pname','$pprice','$gst','$qty','$total')";
					if(mysql_query($s))
					{
						echo "Item added to cart";
					}
					else
					{
						echo "Item not added";
					}
				}
		   
			  	
			  ?>
        </table>
        <p><strong></strong></p>
      </div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="204">&nbsp;</td>
      <td valign="top"><?php echo "<img src='./newprdpic/$ppic' width='150' height='150'>";  ?>&nbsp;</td>
      <td rowspan="2" valign="top"><?php
		$s=mysql_query("select * from temp4");
		$gtot=0;
		echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>GST</th>
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
					$gtot=$gtot+$row[6];
				
			}
		echo "</table><br>";	
		echo "Grand Total : $gtot";
		 
	?>       
              <form action="newprdcountersale4.php" method="post" name="form2">
        <input name="submit" type="submit" value="Confirm">      
              </form>        <p>&nbsp;</p></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="71">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="13"></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    <tr>
      <td height="21"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
</body>
</html>
