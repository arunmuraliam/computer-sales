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
<div id="Layer1" style="position:absolute; left:496px; top:148px; width:587px; height:467px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Old Product Damage Entry </p>
    
	<?php
		include('connection.php');
		session_start();
		$staffid=$_SESSION["staffid"];
		
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
</body>
</html>
