<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style3 {font-size: 18px}
.style4 {font-size: 24px}
-->
</style>
</head>

<body>
<?php include("p2.php");  ?>
<table width="1663" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="1663" height="644" valign="top"><div id="Layer2" style="position:absolute; left:77px; top:147px; width:364px; height:277px; z-index:-1; font-size: 24px; font-weight: bold;">
      <div align="center">
        <p>Cart </p>
        <?php
		$s1 = $_POST["b1"];
		$s2 = $_POST["b2"];
		$s3 = $_POST["b3"];
		include('connection.php');
		session_start();
		$cusid=$_SESSION["cusid"];
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
        <p>&nbsp;</p>
        </div>
    </div>
      <div id="Layer1" style="position:absolute; left:789px; top:146px; width:439px; height:423px; z-index:1; font-weight: bold;">
        <div align="center" class="style4">
          <p>Bank Details </p>
          <form name="form2" method="post" action="payment5.php">
            <?php
		
		$s1=$_POST["t1"];
		$s2=$_POST["t2"];
		$s3=$_POST["t3"];
		$s4=$_POST["t4"];
		$s5=$_POST["t5"];
		$s6=$_POST["t6"];
	?>
            <table width="340" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <th width="127" scope="row"><div align="left"><span class="style3">Card No </span></div></th>
                <td width="207"><?php echo "$s1"; ?>&nbsp;</td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">Bank Name </span></div></th>
                <td><?php echo "$s2"; ?>&nbsp;</td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">CName</span></div></th>
                <td><?php echo "$s3"; ?>&nbsp;</td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">CVV</span></div></th>
                <td><?php echo "$s4"; ?>&nbsp;</td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">Expire Date </span></div></th>
                <td> <span class="style3"> <?php echo "$s5"; ?> / <?php echo "$s6"; ?> </span></td>
              </tr>
              <tr>
                <th colspan="2" scope="row">
                <?php
		  		$s=mysql_query("select * from bank where cardno='$s1' and bname='$s2' and cname='$s3' and cvv='$s4' and month(expdate)='$s5' and year(expdate)='$s6'");
				if(mysql_num_rows($s)==0)
				{
					echo "<b>Invalid Bank Details";
				}
				else
				{
					$ordno=100;
					$orddate = date("y")."-".date("m")."-".date("d");
					include("connection.php");
					$s=mysql_query("select * from ordermaster order by ordno desc");
			
					if($row=mysql_fetch_array($s))
					{
						$ordno=$row[0];
					}
					$ordno++;
		
					
					$s= "insert into ordermaster(ordno,cusid,orddate,total,cardno) values('$ordno','$cusid','$orddate','$gtot','$s1')";
					mysql_query($s);
					//echo "Order placed";
	
							$s=mysql_query("select * from temp1");
							while($row=mysql_fetch_array($s))
							{
								$sss="insert into orderitems values('$ordno','$row[1]','$row[4]')";
								
								mysql_query($sss);
								
							}
							echo "<b><font color='green'>Payment Successful.  The order No is $ordno";
								
				}
		  ?>&nbsp;</th>
              </tr>
            </table>
          </form>
          <p>&nbsp;</p>
        </div>
    </div>      </td>
  </tr>
</table>
</body>
</html>
