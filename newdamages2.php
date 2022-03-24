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
<div id="Layer1" style="position:absolute; left:494px; top:52px; width:587px; height:467px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
   <br><br><br>New Product Damages<br><br>
    
	<?php
	// For staff
		include('connection.php');
		
		
		$s=mysql_query("select * from damage where oldpid is null" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Damage No</th>
						<th>New Product ID</th>
						<th>Quantity</th>
						<th>Reason</th>
						<th>Staff ID</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[4]</td>
						<td>$row[5]</td>
						<td>$row[7]</td>
						
					</tr>";
			}	
			echo "</table>";	
		}
	?>
  </div>
</div>
</body>
</html>
