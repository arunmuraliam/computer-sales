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
<?php include("p1.php");  ?>
</head>
<body>

<div id="Layer1" style="position:absolute; left:377px; top:53px; width:587px; height:467px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
   <br><br> <br><br><p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;PRODUCTS LIST</p>
    
	<?php
	
		include('connection.php');
		session_start();
		//$cusid=$_SESSION["cusid"];
		$s="delete from temp1 ";
		mysql_query($s);
		
		$s=mysql_query("select * from newproductreg" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Products";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>New product ID</th>
						<th>Product name</th>
						<th>Type</th>
						<th>Price</th>
						<th>GST</th>
						<th>Warranty</th>
						<th>Specifications</th>
						<th>Picture</th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
						<td>$row[4]</td>
						<td>$row[5]</td>
						<td><textarea disabled>$row[7]</textarea></td>
						<td align='center'>
							<form action='newprdview1.php' method='post'>
								<input  type='image' src='./newprdpic/$row[6]' width='70' height='70'>
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
</body>
</html>
