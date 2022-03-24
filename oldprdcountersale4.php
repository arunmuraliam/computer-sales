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
<script>
function abc()
{

if(document.form2.t1.value=="" || document.form2.t2.value=="" ||document.form2.t3.value=="" ||document.form2.t4.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form2.t2.value.length<10)
{
alert("please enter atleast 10 digits for phone");
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
    <td width="172">&nbsp;</td>
    <td width="388">&nbsp;</td>
    <td width="601">&nbsp;</td>
  </tr>
  <tr>
    <td height="384">&nbsp;</td>
    <td valign="top"><p align="center"><strong>Cart </strong></p>      <?php
	
	include('connection.php');
		session_start();
		$staffid=$_SESSION["staffid"];
		
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
		echo "</table><br>";	
		echo "Grand Total : $gtot";
		 
	?>
&nbsp;
<p>&nbsp;</p>
  </td>
    <td>&nbsp;</td>
    <td valign="top"><div align="center">
        <p><strong>Customer Details </strong></p>
        <table width="316" border="1" cellspacing="0" cellpadding="0">
	    <form action="oldprdcountersale5.php" onSubmit="return abc()" method="post" name="form2">
          <tr>
            <td width="121">Name</td>
            <td width="189">
              <input type="text" name="t1">
            </td>
          </tr>
          <tr>
            <td>Phone No </td>
            <td>
              <input type="text" name="t2" onKeyPress="return numbers(event)" maxlength="13">
            </td>
          </tr>
          <tr>
            <td>Payment Mode </td>
            <td>
              <select name="list" size="1">
                <option value="gpay">GPay</option>
                <option value="card">Card</option>
                <option value="cash">By Cash</option>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              
              <input type="submit" name="Submit" value="Submit">
              
          </div></td>
            </tr>
	      </form>
        </table>
        <p>&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="230">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
