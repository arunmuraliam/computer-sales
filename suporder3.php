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
<?php include("p5.php"); ?>
<?php $s1 = $_POST["t1"];
$s2 = $_POST["t11"];
	 ?>
<div id="Layer1" style="position:absolute; left:103px; top:154px; width:587px; height:467px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Order To Supplier </p>
    
	<?php
		//$s1 = $_POST["t1"];
		//echo "$s1";
		include('connection.php');
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
				echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td align='center'><form action='suporder2.php' method='post'><input  type='image' src='./newprdpic/$row[6]' width='50' height='50'><input type='text' name='t1' value='$row[0]'></form></td></tr>";
					
			}	
			echo "</table>";	
		}
	?>
  </div>
</div>

<table width="1442" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="708" height="33">&nbsp;</td>
    <td width="388">&nbsp;</td>
    <td width="12">&nbsp;</td>
    <td width="58">&nbsp;</td>
    <td width="155">&nbsp;</td>
    <td width="21">&nbsp;</td>
    <td width="100">&nbsp;</td>
  </tr>
  <tr>
    <td height="40">&nbsp;</td>
    <td rowspan="3" valign="top"><div align="center">
        <p class="style1">Details  </p>
        <form name="form1" method="post" action="suporder3.php">
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
           
			 
              
          </table>
		   <?php
		   		$s = mysql_query("select * from temp where pid='$s1'");
				if(mysql_num_rows($s)>0)
				{
					echo "This product already selected";
				}
				else
				{
					$itemno=0;
					$s=mysql_query("select * from temp order by itemno desc");
			
					if($row=mysql_fetch_array($s))
					{
						$itemno=$row[0];
					}
					$itemno++; 
				
					$s="insert into temp values('$itemno','$s1','$t2','$t3','$s2')";
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
        <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="198">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><?php echo "<img src='./newprdpic/$t7' width='200' height='200'>";  ?></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="64"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="143"></td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="30"></td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td colspan="2" valign="top"><form name="form2" method="post" action="suporder4.php">
        <input type="submit" name="Submit" value="Next Step==&gt;&gt;">
    </form></td>
    <td>&nbsp;</td>
  </tr>
</table>
<div id="Layer2" style="position:absolute; left:677px; top:397px; width:364px; height:277px; z-index:-2; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Cart </p>
	<?php
		$s=mysql_query("select * from temp");
		
		echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Product Type</th>
					<th>Quantity</th>
				</tr>";
			while($row=mysql_fetch_array($s))		
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
						<td>$row[4]</td>
					</tr>";
				
			}
		echo "</table>";	
		
		 
	?>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
