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
.style1 {font-size: 20px}
.style3 {font-size: 24px}
-->
</style>
</head>
<body>
<?php include("p3.php");  ?>
<div id="Layer1" style="position:absolute; left:458px; top:131px; width:676px; height:151px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p class="style3">Delivered Orders </p>
	<form name="form1" method="post" action="receiveorders2.php">
	<?php
	
	include("connection.php");
				session_start();
				$staffid=$_SESSION["staffid"];
				$s=mysql_query("select * from delivery where rdate is null");
				if(mysql_num_rows($s)==0)
				{
					echo "<b>No orders waiting for delivery";
				}
				else
				{
	?>
    <table width="447" height="63" border="1" cellpadding="0" cellspacing="0">
	
      <tr>
        <td width="199"><span class="style1">Select Order </span></td>
        <td width="129">
          <select name="c1" id="c1">
		  	<option selected disabled hidden>Select</option>
		  	<?php 
			 
				include("connection.php");
				$s=mysql_query("select * from delivery where rdate is null");
				while($row=mysql_fetch_array($s))
				{
					echo "<option>$row[0]</option>";
				}
			?>
			
          </select>
        </td>
        <td width="111">
          <input name="Submit" type="submit" id="Submit" value="View">
        </td>
      </tr>
	
    </table>
	<?php
	
	}
	?>
	</form>
    <p>&nbsp;</p>
  </div>
</div>
<div align="center"></div>
</body>
</html>
