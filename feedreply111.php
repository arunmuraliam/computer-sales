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
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value==""
||document.form1.t5.value==""||document.form1.t6.value==""||document.form1.t7.value==""||document.form1.t8.value==""||document.form1.t8.value==""||document.form1.t10.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t4.value.length<6)
{
alert("Pin should be exact 6 digits");
return(false);

}
if(document.form1.t5.value.length<10)
{
alert("Phone  should be Min 10 digits");
return(false);

}


}



</script>
</head>
<body>
<?php include("p5.php");  ?>
<div id="Layer1" style="position:absolute; left:493px; top:134px; width:587px; height:467px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Feedback Reply </p> </div>
    
	<?php
		include('connection.php');
		session_start();
		//$supid=$_SESSION["supid"];
		
		//$s="delete from temp3 ";
		//mysql_query($s);
		
		$s=mysql_query("select * from feedback where supid is not null and reply is null" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Feedbacks";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Feedback ID</th>
						<th>Feedback Date</th>
						<th>Supplier ID</th>
						<th></th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[2]</td>
						<td>$row[6]</td>
						<td align='center'>
							<form action='feedreply222.php' method='post'>
								<input type='submit' name='Submit' value='View'>
								<input type='hidden' name='t1' value='$row[0]'>
								
							</form
						</td>
					</tr>";
			}	
			echo "</table>";	
		}
	?>
</div>
</body>
</html>
