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
<div id="Layer1" style="position:absolute; left:113px; top:153px; width:587px; height:467px; z-index:1; font-size: 24px; font-weight: bold;">
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
							<form action='oldprddamage2.php' method='post'>
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
        <form name="form1" method="post" action="oldprddamage3.php">
          <table width="316" border="1" cellspacing="0" cellpadding="0">
		  
            <!--DWLayoutTable-->
            <tr>
              <td width="135">Old Product ID </td>
              <td width="175"><?php echo "$s1"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Model</td>
              <td><?php echo "$s2"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Current Stock </td>
              <td><?php echo "$s3"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Quantity</td>
              <td><?php echo "$s4"; ?>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">Reason</div></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                <textarea name="t5" id="t5"><?php echo "$s5"; ?></textarea>
              </div></td>
            </tr>
            <tr>
              <td colspan="2"><div align="center">
                <?php
				$damagedate=date("y")."-".date("m")."-".date("d");
			
				$dno="100";
				include("connection.php");
				$s=mysql_query("select * from damage order by dno desc");
			
				if($row=mysql_fetch_array($s))
				{
					$dno=$row[0];
				}
				$dno++; 
				
				$s="insert into damage(dno,oldpid,modelno,qty,reason,ddate,staffid) values('$dno','$s1','$s2','$s4','$s5','$damagedate','$staffid')";
				if(mysql_query($s))
				{
				$ss="update oldstock set cstock=cstock-$s4 where oldpid='$s1' and model='$s2'" ;
				if(mysql_query($ss))
				{
					echo "Entry Done..";
				}
				else
				{
					echo "Entry Not Done...";
				}
				}
				else
				{	
					echo "<b>Product Not Inserted";
				}		
				
				?>
				<?php echo "<input type='hidden' name='t1' value='$row[0]'>"; ?>
				<?php echo "<input type='hidden' name='t2' value='$row[1]'>"; ?>
				<?php echo "<input type='hidden' name='t3' value='$row[2]'>"; ?>
              </div></td>
            </tr>
            
          </table>
		 <?php echo "<input type='hidden' name='t11' value='$s1'>";  ?>
        </form>
        
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  
</table>
</body>
</html>
