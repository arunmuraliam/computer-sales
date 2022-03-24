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
<script>
function printf()
{
window.print();
}

</script>
</head>
<body>
<?php include("p3.php");  ?>
<div id="Layer1" style="position:absolute; left:408px; top:53px; width:587px; height:467px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
   <br><br><br><br>Supplier List<br><br>
    
	<?php
	// For admin
		include('connection.php');
		
		
		$s=mysql_query("select * from supplier " );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Staff";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Supplier ID</th>
						<th>Supplier Name</th>
						<th>Firm Name</th>
						<th>Place</th>
						<th>Phone</th>
						<th>Email</th>
						
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[5]</td>
						<td>$row[7]</td>
						<td>$row[10]</td>
						
					</tr>";
			}	
			echo "</table>";	
		}
	?>
	<form  name="form1" method="post" action="">
      <input type="submit" name="Submit" value="Print" onClick="printf()">
    </form>
  </div>
</div>
</body>
</html>
