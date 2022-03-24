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
<script>
function abc()
{

if(document.form2.t2.value=="" || document.form2.t3.value=="" ||document.form2.t4.value=="" ||document.form2.t5.value==""
||document.form2.t6.value==""||document.form1.t6.value==""||document.form1.t7.value==""||document.form1.t8.value==""||document.form1.t8.value==""||document.form1.t10.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form2.t2.value.length<12)
{
alert("Card No should be exact 12 digits");
return(false);

}
if(document.form2.t5.value.length<3)
{
alert("CVV should be Min 3 digits");
return(false);

}


}



</script>
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
<div id="Layer3" style="position:absolute; left:523px; top:137px; width:315px; height:465px; z-index:-3">
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
<div id="Layer1" style="position:absolute; left:885px; top:137px; width:439px; height:423px; z-index:-1; font-weight: bold;">
  <div align="center" class="style4">
    <p>Bank Details </p>
	<form name="form2" method="post" onSubmit="return abc()" action="payment4.php">
      <table width="356" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <th width="127" scope="row"><div align="left"><span class="style3">Card No </span></div></th>
          <td width="223"><input name="t2" type="text" id="t2" onKeyPress="return numbers(event)" maxlength="12"></td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">Bank Name </span></div></th>
          <td><input name="t3" type="text" id="t3" onKeyPress="return alphabets(event)"></td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">CName</span></div></th>
          <td><input name="t4" type="text" id="t4" onKeyPress="return alphabets(event)"></td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">CVV</span></div></th>
          <td><input name="t5" type="text" id="t5" onKeyPress="return numbers(event)" maxlength="3"></td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style3">Expire Date </span></div></th>
          <td>            <span class="style3">
            <select name="t6" id="t6">
				<option>01</option>>
				<option>02</option>>
				<option>03</option>>
				<option>04</option>>
				<option>05</option>>
				<option>06</option>>
				<option>07</option>>
				<option>08</option>>
				<option>09</option>>
				<option>10</option>>
				<option>11</option>>
				<option>12</option>>
            </select>
            MM 
            <select name="t7" id="t7">
				<?php
					$y=date("Y");
					for($i=$y;$i<=$y+10;$i++)
					{
						echo "<option>$i</option>";
					}
				?>
            </select>YYYY </span></td>
        </tr>
        <tr>
          <th colspan="2" scope="row"><input type="submit" name="Submit" value="Pay">
		  <?php
			echo "<input type='hidden' name='t1' value='$s1'>";
		?>
		</th>
        </tr>
      </table>
	</form>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
