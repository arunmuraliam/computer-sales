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
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t1.value.length<12)
{
alert("Pin should be exact 12 digits");
return(false);

}
if(document.form1.t4.value.length<3)
{
alert("Phone  should be Min 3 digits");
return(false);

}
if(document.form1.t9.value != document.form1.t10.value)
{
alert("Password and Retype Password should be Same");
return(false);

}

}



</script>
<body>
<?php include("p2.php");  ?>
<table width="1663" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="1663" height="644" valign="top"><div id="Layer2" style="position:absolute; left:78px; top:148px; width:364px; height:277px; z-index:2; font-size: 24px; font-weight: bold;">
      <div align="center">
        <p>Cart </p>
        <?php
		
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
      <div id="Layer1" style="position:absolute; left:788px; top:147px; width:439px; height:294px; z-index:4; font-weight: bold;">
        <div align="center" class="style4">
          <p>Bank Details </p>
          <form name="form2" method="post" onSubmit="return abc()" action="custorder5.php">
            <table width="361" border="1" cellspacing="0" cellpadding="0">
              <tr>
                <th width="127" scope="row"><div align="left"><span class="style3">Card No </span></div></th>
                <td width="215"><input name="t1" type="text" id="t1" onKeyPress="return numbers(event)" maxlength="12"></td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">Bank Name </span></div></th>
                <td><input name="t2" type="text" id="t2"></td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">CName</span></div></th>
                <td><input name="t3" type="text" id="t3"></td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">CVV</span></div></th>
                <td><input name="t4" type="text" id="t4" onKeyPress="return numbers(event)" maxlength="3"></td>
              </tr>
              <tr>
                <th scope="row"><div align="left"><span class="style3">Expire Date </span></div></th>
                <td> <span class="style3">
                  <select name="t5" id="t5">
                    <option>01</option>
                    >
                    <option>02</option>
                    >
                    <option>03</option>
                    >
                    <option>04</option>
                    >
                    <option>05</option>
                    >
                    <option>06</option>
                    >
                    <option>07</option>
                    >
                    <option>08</option>
                    >
                    <option>09</option>
                    >
                    <option>10</option>
                    >
                    <option>11</option>
                    >
                    <option>12</option>
                    >
                  </select>
            MM
            <select name="t6" id="t6">
              <?php
					$y=date("Y");
					for($i=$y;$i<=$y+10;$i++)
					{
						echo "<option>$i</option>";
					}
				?>
            </select>
            YYYY </span></td>
              </tr>
              <tr>
                <th colspan="2" scope="row"><input type="submit" name="Submit" value="Pay">
                   
                </th>
              </tr>
            </table>
          </form>
		  <?php 
	//echo "<input type='hidden' name='b1' value='$s1'>";
	//echo "<input type='hidden' name='b2' value='$s2'>";
	//echo "<input type='hidden' name='b3' value='$s3'>";
	?>
          <p>&nbsp;</p>
        </div>
    </div></td>
  </tr>
</table>
</body>
</html>
