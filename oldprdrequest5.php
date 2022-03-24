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
</script>
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style></head>
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t1.value.length<1)
{
alert("Pin should be exact 6 digits");
return(false);

}
if(document.form1.t2.value.length<1)
{
alert("Phone  should be Min 10 digits");
return(false);

}


}



</script>
<body>
<?php include("p2.php");  ?>
<table width="1677" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="528" height="33">&nbsp;</td>
    <td width="101">&nbsp;</td>
    <td width="343">&nbsp;</td>
    <td width="101">&nbsp;</td>
    <td width="604">&nbsp;</td>
  </tr>
  <tr>
    <td height="77">&nbsp;</td>
    <td colspan="3" valign="top"><div align="center" class="style1">Old Products Price List </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="28">&nbsp;</td>
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
    <td height="130"></td>
    <td></td>
    <td valign="top"> <?php
				include('connection.php');
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
					
				$gtot=$gtot+ $row[6];
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
  <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="29"></td>
    <td></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="85"></td>
    <td></td>
    <td valign="top"><form name="form1" method="post" onSubmit="return abc()" action="oldprdrequest6.php">
        <table width="332" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="170">Acc No </td>
            <td width="156"><input name="t1" type="text" id="t1" onKeyPress="return numbers(event)" maxlength="12"></td>
          </tr>
          <tr>
            <td>IFSC</td>
            <td><input name="t2" type="text" id="t2" ></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              <input type="submit" name="Submit" value="Confirm Sale Request">
            </div></td>
          </tr>
        </table>
    </form></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="304"></td>
    <td></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
</table>
</body>
</html>
