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
<body>
<?php include("p3.php");  ?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td width="1623" height="644">
  <!--DWLayoutTable-->
  <div id="Layer1" style="position:absolute; left:496px; top:125px; width:587px; height:467px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>New Product Countersale </p>
    
	<?php
		include('connection.php');
		session_start();
		$staffid=$_SESSION["staffid"];
		
		$s="delete from temp4 ";
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
  &nbsp;</td>
  </tr>
</table>
</body>
</html>
