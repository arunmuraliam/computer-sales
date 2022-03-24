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
.style3 {font-size: 20px; font-weight: bold; }
-->
</style>
</head>
</script>
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style></head>
<script>
function abc()
{
if(document.form1.t3.value=="" )
{
alert("Please enter All");
return(false);

}

if(document.form1.t3.value.length<1)
{
alert("please enter quantity");
return(false);

}



}



</script>
<body>
<?php include("p2.php");  ?>
<table width="1677" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="30" height="33">&nbsp;</td>
    <td width="487">&nbsp;</td>
    <td width="46">&nbsp;</td>
    <td width="21">&nbsp;</td>
    <td width="272">&nbsp;</td>
    <td width="184">&nbsp;</td>
    <td width="158">&nbsp;</td>
    <td width="10">&nbsp;</td>
    <td width="335">&nbsp;</td>
    <td width="134">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4" valign="top"><div align="center" class="style1">Old Products Price List </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="67">&nbsp;</td>
    <td colspan="2" rowspan="4" valign="top">
<?php
		include('connection.php');
		session_start();
		$cusid=$_SESSION["cusid"];
		
		$pid=$_POST["t1"];
		$model=$_POST["t2"];
		$s="delete from temp ";
		mysql_query($s);
		
		$s=mysql_query("select * from oldproductreg" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Old product ID</th>
						<th>Product name</th>
						<th>Type</th>
						<th>Select</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
			if($pid==$row[0])
			
				echo "<tr bgcolor='#aabbcc'>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td align='center'>
							<form action='oldprdrequest2.php' method='post'>
								<input  type='submit' value='show details'>
								<input type='hidden' name='t1' value='$row[0]'>
							</form>
						</td>
					</tr>";
					else
					echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td align='center'>
							<form action='oldprdrequest2.php' method='post'>
								<input  type='submit' value='show details'>
								<input type='hidden' name='t1' value='$row[0]'>
							</form>
						</td>
					</tr>";
					
			}	
			echo "</table>";	
		}
	?>	
&nbsp;</td>
  <td>&nbsp;</td>
    <td rowspan="3" valign="top">
	
	
	  <table width="272" height="253" border="0" cellpadding="0" cellspacing="0">
	    <!--DWLayoutTable-->
        <tr>
          <td width="0"></td>
          <th width="207" scope="row"><?php
		
	    $s=mysql_query("select * from oldproductreg where oldpid='$pid'" );
		$row=mysql_fetch_array($s);
		$ppic=$row[3];
		
		echo "<img src='./oldprdpic/$row[3]' width='150' height='150'>";
	
	?>&nbsp;</th>
          
        </tr>
        <tr>
          <td></td>
          <th height="56" scope="row"><span class="style3">Product Specifications</span> &nbsp;</th>
          <td width="10"></td>
        </tr>
        <tr>
          <td></td>
          <th scope="row"><textarea><?php echo $row[4]; ?></textarea>&nbsp;</th>
          <td></td>
        </tr>
      </table></td>
    <td colspan="2" rowspan="4" valign="top"><div align="center">
        <p><strong>Model Details </strong></p>
        <p>&nbsp;
	    <?php
	  	$s=mysql_query("select * from oldacchild where oldpid='$pid'");
		echo "<table width='100%' border='1'>
				<tr>
					
					<th>Model</th>
					<th>Purchase Price</th>
					<th>Sale Price</th>
					<th>Details</th>
					<th>Select</th>
				</tr>
				";
		while($row=mysql_fetch_array($s))
		{
			
			//$ss=mysql_query("select * from oldacchild where oldpid='$pid' ");
	
		
			
		
		echo "<tr>
					<td>$row[1]</td>
					<td>$row[2]</td>
					<td>$row[3]</td>
					<td>$row[4]</td>
					<td align='center'>
							<form action='oldprdrequest3.php' method='post'>
								<input  type='submit' value='view'>
								<input type='hidden' name='t1' value='$pid'>
								<input type='hidden' name='t2' value='$row[1]'>
							</form
						</td>
					</tr>";
			}
			
			echo "</table>";
	  ?></p>
    </div></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="96">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td valign="top"><form action="oldprdrequest4.php" name="form1" method="post" onSubmit="return abc()">
		<p>Quantity: 
		  <input type="text" name="t3" id="t3" onKeyPress="return numbers(event)" maxlength="4">
		  <input type="submit" value="Submit">
          <?php echo "<input type='hidden' name='t1' value='$pid'>";
         echo  "<input type='hidden' name='t2' value='$model'>";
		 ?></p>
	</form></td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="126">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="109"></td>
    <td>&nbsp;</td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="81"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
