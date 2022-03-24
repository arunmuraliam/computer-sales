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
<script>
function abc()
{
if(document.form4.t2.value=="" || document.form4.t3.value=="")
{
alert("Please enter all");
return(false);

}

var x,y;
x=Number(document.form4.t0.value);
y=Number(document.form4.t2.value);
if(y>x)
{
alert("Damage quantity should not greater than the current stock");
return(false);

}


}

</script>
<body>
<?php include("p3.php");  ?>
<div id="Layer1" style="position:absolute; left:104px; top:147px; width:587px; height:467px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Order To Supplier </p>
    
	<?php
		$s1 = $_POST["t1"];
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
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td align='center'>
							<form action='newprddamage2.php' method='post'>
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
<table width="1520" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="701" height="33">&nbsp;</td>
    <td width="379">&nbsp;</td>
    <td width="45">&nbsp;</td>
    <td width="395">&nbsp;</td>
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
				$t7=$row[7];
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
              <td><?php echo "$t7"; ?>&nbsp;</td>
            </tr>
          </table>
		  <?php echo "<input type='hidden' name='t11' value='$s1'>";  ?>
        </form>
        <p class="style1"><?php echo "<img src='./newprdpic/$row[6]' width='200' height='200'>";  ?></p>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
  		
		$s=mysql_query("select * from newstock where newpid='$s1'");
		if($row=mysql_fetch_array($s))
		{
			$cstock=$row[1];
			
		}
  ?>
  <tr>
    <td height="198">&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><table width="371" border="1" cellspacing="0" cellpadding="0">
	<form name="form4" method="post" onSubmit="return abc()" action="newprddamage3.php">
      <tr>
        <th width="158" scope="row"><div align="left">Current Stock </div></th>
        <td width="207"><?php echo "$cstock"; echo "<input type='hidden' name='t0' value='$cstock'>"; ?>&nbsp;</td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Damage Quantity </div></th>
        <td>
          <input name="t2" type="text" id="t2" name="t2" onKeyPress="return numbers(event)" maxlength="4">
        </td>
      </tr>
      <tr>
        <th scope="row"><div align="left">Reason</div></th>
        <td>
          <textarea name="t3" id="t3" name="t3"></textarea>
        </td>
      </tr>
      <tr>
        <th colspan="2" scope="row">
          <input type="submit" name="Submit" value="Submit">
		  <?php echo "<input type='hidden' name='t11' value='$s1'>";  ?>
        </th>
        </tr>
		</form>
    </table></td>
  </tr>
  <tr>
    <td height="237">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
