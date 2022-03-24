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

if(document.form2.t1.value=="" || document.form2.t2.value=="" ||document.form2.t3.value=="" ||document.form2.t4.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form2.t2.value.length<1)
{
alert("enter quantity");
return(false);

}


}



</script>
<body>
<?php include("p3.php");  ?>

  <!--DWLayoutTable-->
  <div id="Layer1" style="position:absolute; left:83px; top:177px; width:515px; height:401px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>New Product Countersale </p>
    
	<?php
		include('connection.php');
		session_start();
		$staffid=$_SESSION["staffid"];
		$s1=$_POST["t1"];
		
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
      <td width="648" height="65">&nbsp;</td>
      <td width="377">&nbsp;</td>
      <td width="56">&nbsp;</td>
      <td width="208">&nbsp;</td>
      <td width="344">&nbsp;</td>
    </tr>
    <tr>
      <td height="86">&nbsp;</td>
      <td rowspan="3" valign="top"><div align="center">
        <p class="style1">Product Details </p>
        <table width="336" border="1" cellspacing="0" cellpadding="0">
		<form name="form2" method="post" onSubmit="return abc()" action="newprdcountersale3.php">
		<?php
		$s=mysql_query("select * from newproductreg where newpid='$s1'");
		$row=mysql_fetch_array($s);
		$pname=$row[1];
		$pprice=$row[3];
		$gst=$row[4];
		$warranty=$row[5];
		$ppic=$row[6];
		$pspec=$row[7];
		
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
            <td>
              <input name="t2" type="text" id="t2" onKeyPress="return numbers(event)" maxlength="4">
</td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              
<input type="submit" name="Submit2" value="Submit">                
<?php echo "<input type='hidden' name='t1' value='$s1'>"; ?>             
 
            </div></td>
          </tr>
		  </form>
        </table>
        <p><strong></strong></p>
      </div></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="204">&nbsp;</td>
      <td>&nbsp;</td>
      <td valign="top"><?php echo "<img src='./newprdpic/$ppic' width='150' height='150'>";  ?>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="120">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="39">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</body>
</html>
