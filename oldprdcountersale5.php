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
</head>
<script>
function abc()
{
if(document.form1.t5.value=="")
{
alert("Please enter Quantity");
return(false);

}

var x,y;
x=Number(document.form1.t0.value);
y=Number(document.form1.t5.value);
if(y>x)
{
alert("Sale quantity should not greater than the current stock");
return(false);

}


}

</script>
<body>
<?php include("p3.php");  ?>
<table width="1587" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="95" height="30">&nbsp;</td>
    <td width="331">&nbsp;</td>
    <td width="81">&nbsp;</td>
    <td width="388">&nbsp;</td>
    <td width="64">&nbsp;</td>
    <td width="139">&nbsp;</td>
    <td width="489">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td rowspan="2" valign="top"><p align="center"><strong>Cart </strong></p>      <?php
	
	include('connection.php');
		session_start();
		$staffid=$_SESSION["staffid"];
		
		$s1=$_POST["t1"];
		$s2=$_POST["t2"];
		$s3=$_POST["list"];
		
		$s=mysql_query("select * from temp3");
		$gtot=0;
		echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Old Product ID</th>
					<th>Model Number</th>
					<th>Sale Price</th>
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
						
					</tr>";
					$gtot=$gtot+$row[5];
				
			}
		echo "</table>";	
		echo "Grand Total $gtot";
		
		 
	?>
&nbsp;
<p>&nbsp;</p></td>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><div align="center">
      <p><strong>Customer Details </strong></p>
      <table width="316" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="121">Name</td>
          <td width="189"><?php echo "$s1"; ?></td>
        </tr>
        <tr>
          <td>Phone No </td>
          <td><?php echo "$s2"; ?></td>
        </tr>
        <tr>
          <td>Payment Mode </td>
          <td><?php echo "$s3"; ?></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <?php
			$sno=0;
			$s=mysql_query("select * from countersale order by sno desc");
			
			if($row=mysql_fetch_array($s))
			{
				$sno=$row[0];
			}
			$sno++;
			$sdate=date("y")."-".date("m")."-".date("d");
			$ss="insert into countersale values('$sno','$s1','$s2','$s3','$sdate','$gtot','$staffid')";
			
			if(mysql_query($ss))
			{
			echo "Done";
			}
			else
			{
			echo "Not Inserted";
			}
			
							$s=mysql_query("select * from temp3");
							while($row=mysql_fetch_array($s))
							{
								$sss="insert into saleitems(sno,itemno,oldpid,model,qty) values('$sno','$row[0]','$row[1]','$row[2]','$row[4]')";
								
								mysql_query($sss);
								$ssss="update oldstock set cstock=cstock-$row[4] where oldpid='$row[1]' and model='$row[2]'" ;
								mysql_query($ssss);
								
							}
							echo "<b><font color='green'>Order Confirmed.  The sale No is $sno";
			?>
          </div></td>
          </tr>
      </table>
      <p>&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td valign="top"><button onClick="window.print()">Print</button><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="307">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="230">&nbsp;</td>
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
