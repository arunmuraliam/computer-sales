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
<div id="Layer1" style="position:absolute; left:71px; top:144px; width:587px; height:467px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
     <p>Old Product Damage Entry </p>
    
	<?php
		include('connection.php');
		session_start();
		$staffid=$_SESSION["staffid"];
		
		$s1=$_POST["t1"];
		$s2=$_POST["t2"];
		$s3=$_POST["t3"];
		$s4=$_POST["t4"];
		$s5=$_POST["t5"];
		
		$s="delete from temp ";
		mysql_query($s);
		
		$s=mysql_query("select * from oldstock where cstock>0" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Old product ID</th>
						<th>Model</th>
						<th>Current Stock</th>
						<th>Select</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td align='center'>
							<form action='oldprdcountersale2.php' method='post'>
								<input type='submit' name='Submit' value='Next'>
								<input type='hidden' name='t1' value='$row[0]'>
								<input type='hidden' name='t2' value='$row[1]'>
								<input type='hidden' name='t3' value='$row[2]'>
							</form
						</td>
					</tr>";
			}	
			echo "</table>";	
		}
	?>
  </div>
</div>
<table width="1568" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="701" height="33">&nbsp;</td>
    <td width="379">&nbsp;</td>
    <td width="449">&nbsp;</td>
    <td width="39">&nbsp;</td>
  </tr>
  <tr>
    <td height="267"></td>
    <td rowspan="4" valign="top"><div align="center">
        <p class="style1">Details  </p>
        <form name="form1" method="post" onSubmit="return abc()" action="oldprdcountersale3.php">
          <table width="333" border="1" cellspacing="0" cellpadding="0">
		  <?php
		    $ss=mysql_query("select * from oldacchild where oldpid='$s1' and model='$s2'");
			
			if($row=mysql_fetch_array($ss))
			{
				$sprice=$row[3];
			}
		   
		  ?>
            <!--DWLayoutTable-->
            <tr>
              <td width="148">Old Product ID </td>
              <td width="179"><?php echo "$s1"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Model</td>
              <td><?php echo "$s2"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Current Stock </td>
              <td><?php echo "$s3";
			  echo "<input type='hidden' name='t0' value='$s3'>";
			  
			   ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Sale Price</td>
              <td><?php echo "$sprice"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td><div align="left">Quantity</div></td>
              <td><?php echo "$s5"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Total</td>
              <td><?php
			  $total=$sprice*$s5;
			  echo "$total";
			   ?>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
               
				<?php echo "<input type='hidden' name='t1' value='$s1'>"; ?>
				<?php echo "<input type='hidden' name='t2' value='$s2'>"; ?>
				<?php echo "<input type='hidden' name='t3' value='$s3'>"; ?>
				<?php echo "<input type='hidden' name='t4' value='$sprice'>"; ?>
              </div></td>
            </tr>
            
          </table>
		 <?php echo "<input type='hidden' name='t11' value='$s1'>";  ?>
		 
		 
		 <?php
		   		$s = mysql_query("select * from temp3 where oldpid='$s1' and modelno='$s2'");
				if(mysql_num_rows($s)>0)
				{
					echo "This product already selected";
				}
				else
				{
					$itemno=0;
					$s=mysql_query("select * from temp3 order by itemno desc");
			
					if($row=mysql_fetch_array($s))
					{
						$itemno=$row[0];
					}
					$itemno++; 
					
					//$total=$sprice*$s5;
				
					$s="insert into temp3 values('$itemno','$s1','$s2','$sprice','$s5','$total')";
					if(mysql_query($s))
					{
						echo "Item added to cart";
					}
					else
					{
						echo "Item not added";
					}
				}
		   
			  	
			  ?>
        </form>
        
    </div></td>
    <td valign="top">
	
			  <p class="style1">Cart </p>			  <?php
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
	<p>&nbsp;</p>	<form action="oldprdcountersale4.php" method="post" name="form2">
	    <input name="submit" type="submit" value="Confirm">
    </form></td>
  <td></td>
  </tr>
  <tr>
    <td height="16"></td>
    <td></td>
    <td></td>
  </tr>

  
</table>
</body>
</html>
