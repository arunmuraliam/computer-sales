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
<?php include("p2.php");  ?>
<div id="Layer1" style="position:absolute; left:104px; top:154px; width:587px; height:467px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Select Order </p>
    
	<?php
		$s1 = $_POST["t1"];
		$s2 = $_POST["t11"];
		$s33 = $_POST["t22"];
		include('connection.php');
		session_start();
		$cusid=$_SESSION["cusid"];
		$s=mysql_query("select * from newproductreg" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>New product ID</th>
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
							<form action='custorder2.php' method='post'>
								<input  type='image' src='./newprdpic/$row[6]' width='50' height='50'>
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


<table  width="1373" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="731" height="33">&nbsp;</td>
    <td width="123">&nbsp;</td>
    <td width="175">&nbsp;</td>
    <td width="77">&nbsp;</td>
    <td width="62">&nbsp;</td>
    <td width="190">&nbsp;</td>
    <td width="15">&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td colspan="3" rowspan="3" valign="top"><div align="center">
        <p class="style1">Details  </p>
        <form name="form1" method="post" action="custorder3.php">
          <table width="281" border="1" cellspacing="0" cellpadding="0">
		  <?php
			include("connection.php");
	  		$s=mysql_query("select * from newproductreg where newpid='$s1'");
			if($row=mysql_fetch_array($s))
			{
				
				$t2=$row[1];
				$t3=$row[2];
				$t4=$row[3];
				$t5=$row[4];
				$t6=$row[5];
				$t7=$row[6];
				$t8=$row[7];
			}
		  ?> 
            <!--DWLayoutTable-->
            <tr>
              <td width="126">Product ID </td>
              <td width="149"><?php echo "$s1"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Product Name</td>
              <td><?php echo "$t2"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Product Type </td>
              <td><?php echo "$t3"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Price</td>
              <td><?php echo "$t4"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>GST</td>
              <td><?php echo "$t5"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Warranty</td>
              <td> <?php echo "$t6"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Product Specs </td>
              <td><?php echo "$t8"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td><?php echo "$s2"; ?>&nbsp;</td>
            </tr>
			<tr>
              <td>Order Description</td>
              <td><?php echo "$s33"; ?>&nbsp;</td>
            </tr>
           
			 
              
          </table>
		   <?php
		   		$s = mysql_query("select * from temp1 where pid='$s1'");
				if(mysql_num_rows($s)>0)
				{
					echo "This product already selected";
				}
				else
				{
					$itemno=0;
					$s=mysql_query("select * from temp1 order by itemno desc");
			
					if($row=mysql_fetch_array($s))
					{
						$itemno=$row[0];
					}
					$itemno++; 
					$tax=$t4*($t5/100);
					$price=$t4+$tax;
					$total=$s2*$price;
				
					$s="insert into temp1 values('$itemno','$s1','$t2','$t3','$s2','$t4','$t5','$total')";
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
		  
        </form>
		<?php
		   		//$ss = mysql_query("select * from orderitems where ordno='$s1'");
				//if(mysql_num_rows($s)>0)
				//{
					//echo "This product already selected";
				//}
			//else
				//{
					$ordno=124;
					$s=mysql_query("select * from orderitems order by ordno desc");
			
					if($row=mysql_fetch_array($s))
					{
						$ordno=$row[0];
					}
					$ordno++; 
					
				
					$s="insert into orderitems values('$ordno','$s1','$s2','$s33')";
					if(mysql_query($s))
					{
						echo "Done";
					}
					else
					{
						echo "Item not added";
					}
				//}
		   
			  	
			  ?>
        <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="198">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><?php echo "<img src='./newprdpic/$t7' width='200' height='200'>";  ?></td>
  <td>&nbsp;</td>
  </tr>
 
  <tr>
    <td height="64">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="143">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30"></td>
    <td></td>
    <td valign="top"><form name="form2" method="post" action="custorder4.php">
	<div id="Layer3" style="position:absolute; left:1379px; top:557px; width:122px; height:73px; z-index:3">
  <input type="submit" name="Submit" value="Next Step==&gt;&gt;">
</div>
    </form>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<div id="Layer2" style="position:absolute; left:747px; top:422px; width:364px; height:277px; z-index:2; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Cart </p>
	<?php
		$s=mysql_query("select * from temp1");
		$gtot=0;
		echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Product Type</th>
					<th>Quantity</th>
					<th>Price</th>
					<th>GST</th>
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
						<td>$row[7]</td>
					</tr>";
					$gtot=$gtot+$row[7];
				
			}
		echo "</table><br>";	
		echo "Grand Total : $gtot";
		 
	?>
	<?php 
	//echo "<input type='hidden' name='a1' value='$s1'>";
	//echo "<input type='hidden' name='a2' value='$s2'>";
	//echo "<input type='hidden' name='a3' value='$s3'>";
	?>
	
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
