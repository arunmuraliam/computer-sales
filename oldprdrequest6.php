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
.style2 {font-size: 20px}
-->
</style>
</head>

<body>
<?php include("p2.php");  ?>
<table width="1677" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="533" height="33">&nbsp;</td>
    <td width="102">&nbsp;</td>
    <td width="332">&nbsp;</td>
    <td width="102">&nbsp;</td>
    <td width="608">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td colspan="3" valign="top"><div align="center" class="style1">Old Products Price List </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><div align="center" class="style1 style2">Selected Items </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="130">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"> <?php
				include('connection.php');
				$s1=$_POST["t1"];
				$s2=$_POST["t2"];
				session_start();
				$cusid=$_SESSION["cusid"];
				$gtot=0;
		   		//$s = mysql_query("select * from temp2 where model='$model'"); //check
				//if(mysql_num_rows($s)>0)
				//{
					//echo "This product already selected";
				//}
				//else
				//{
					//$itemno=0;
					//$s=mysql_query("select * from temp2 order by itemno desc");
			
					//if($row=mysql_fetch_array($s))
					//{
						//$itemno=$row[0];
					//}
					//$itemno++; 
					
					//$ss=mysql_query("select * from oldproductreg where oldpid='$pid'");
					//$row1=mysql_fetch_array($ss);
					//$pname=$row1[1];
					
					//$s1=mysql_query("select * from oldacchild where oldpid='$pid' and model='$model'");
					//$row2=mysql_fetch_array($s1);
					//$pprice=$row2[2];
					
					//$total=$pprice*$qty;
				
					//$s="insert into temp2 values('$itemno','$pid','$pname','$model','$pprice','$qty','$total')";
					
					//if(mysql_query($s))
					//{
						$s=mysql_query("select * from temp2");
						
						echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					<th>Product Name</th>
					<th>Model</th>
					<th>Purchase Price</th>
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
					$gtot =$gtot + $row[6];
				
			}
		echo "</table><br>";
						echo "Grand Total : $gtot";
						
					//}
					//else
					//{
						//echo "Item not added";
					//}
				//}
		   
			  	
			  ?>      &nbsp;</td>
  <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="70">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top">
      <table width="332" border="1" cellspacing="0" cellpadding="0">
        <!--DWLayoutTable-->
        <tr>
          <td width="170">Acc No </td>
          <td width="156"><?php echo $s1;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td>IFSC</td>
          <td><?php echo $s2;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <?php 
		$reqno=0;
		$s=mysql_query("select * from oldsalereq order by reqno desc");
		if($row=mysql_fetch_array($s))
		{
			$reqno=$row[0];
		}
		$reqno++;
		$reqdate=date("y")."-".date("m")."-".date("d");
		
		$s="insert into oldsalereq(reqno,custid,reqdate,gtot,accno,ifsc) values($reqno,'$cusid','$reqdate',$gtot,'$s1','$s2')";
		mysql_query($s);
		$s1=mysql_query("select * from temp2");
		
	while($row=mysql_fetch_array($s1))		
			{
				
						$itemno=$row[0];
						$oldpid=$row[1];
						$pname=$row[2];
						$model=$row[3];
						$pprice=$row[4];
						$qty=$row[5];
						//echo "insert into oldsaleitems values($reqno,$itemno,'$oldpid','$model',$qty)";
						$s="insert into oldsaleitems values($reqno,$itemno,'$oldpid','$model',$qty)";
						$ss=mysql_query($s);
						echo "Done";
						//if(mysql_query($ss))
						//{
							//echo "Success";
						//}
						
						
				
			}
	
	
	?>
            </div></td>
        </tr>
           </table></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="298">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
