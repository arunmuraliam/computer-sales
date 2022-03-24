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
.style3 {font-size: 18px}
.style1 {font-size: 20px}
.style4 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>
<body>
<div id="Layer1" style="position:absolute; left:457px; top:30px; width:676px; height:151px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p class="style2">Old Products Model Entry </p>
	<form name="form1" method="post" action="oldacchild1.php">
		
		
    	<table width="447" height="63" border="1" cellpadding="0"  cellspacing="0">
		
			
      	<tr>
        	<td width="199">&nbsp;</td>
        	<td width="129">&nbsp;</td>
<td width="111"><form name="form2" method="post" action="oldacchild1.php"><?php
$s1=$_POST["c1"];
?>
  <table width="447" height="63" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <td width="199"><span class="style1">Select Old Product ID </span></td>
            <td width="129">
              <select name="select" id="select">
                <option selected disabled hidden>Select</option>
                <?php 
			 
				include("connection.php");
				
				$s=mysql_query("select * from oldproductreg");
				echo "<option>$s1</option>";
				while($row=mysql_fetch_array($s))
				{
					echo "<option>$row[0]</option>";
				}
			?>
              </select>
            </td>
            <td width="111">
              <input name="Submit4" type="submit" id="Submit2" value="New">
            </td>
          </tr>
        </table>	
            </form>
    <p>&nbsp;</p>
  </div>
</div>
<div id="Layer1" style="position:absolute; left:32px; top:268px; width:365px; height:215px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Details</p>
    <table width="293" border="1" cellspacing="0" cellpadding="0">
	
	<?php
		
		include("connection.php");
	  	$s=mysql_query("select * from oldproductreg where oldpid='$s1'");
		if($row=mysql_fetch_array($s))
		{
			$pname=$row[1];
			$ptype=$row[2];
			$filename=$row[3];
			$psp=$row[4];
		}
	  ?>
      <tr>
        <td width="138"><span class="style3">Old PID </span></td>
        <td width="149"><?php echo "$s1"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Product Name </span></td>
        <td><?php echo "$pname"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Type</span></td>
        <td><?php echo "$ptype"; ?>&nbsp;</td>
      </tr>
      <tr>
        <td><span class="style3">Specification</span></td>
        <td><?php echo "$psp"; ?>&nbsp;</td>
      </tr>
	  
    </table>
    <p>&nbsp;</p>
  </div>
</div>
<div id="Layer2" style="position:absolute; left:422px; top:278px; width:251px; height:177px; z-index:2">
	<?php echo "<img src='./oldprdpic/$filename' width='200' height='200'>";  ?>
</div>
<div id="Layer3" style="position:absolute; left:730px; top:245px; width:312px; height:222px; z-index:3; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Existing Model </p>
	<?php
		$s = mysql_query("select * from oldacchild where oldpid ='$s' ");
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No models registered";
		} 
		else
		{
			echo "<table border='1' width='100%' >
				<tr>
					<th>Model No</th>
					<th>Purchase Price</th>
					<th>Sale Price</th>
				</tr>";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
					</tr>";
			}	
			echo "</table>";
		}
	?>
    <p>&nbsp;</p>
  </div>
</div>
<div id="Layer4" style="position:absolute; left:1115px; top:217px; width:353px; height:295px; z-index:4">
  <div align="center" class="style4">
    <p>New Model </p>
    <form name="form1" method="post" action="">
      <table width="341" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="128"><span class="style3">Model No</span></td>
          <td width="207"><input name="t1" type="text" id="t1"></td>
        </tr>
        <tr>
          <td height="27"><span class="style3">Purchase Price </span></td>
          <td><input name="t2" type="text" id="t2"></td>
        </tr>
        <tr>
          <td><span class="style3">Sale Price </span></td>
          <td><input name="t3" type="text" id="t3"></td>
        </tr>
        <tr>
          <td><span class="style3">Details</span></td>
          <td><textarea name="t4" id="t4"></textarea></td>
        </tr>
        <tr>
          <td colspan="2"><div align="center">
            <input type="submit" name="Submit2" value="Submit">
            <input type="reset" name="Submit3" value="Reset">
          </div></td>
        </tr>
      </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
<p>&nbsp;</p>
</body>
</html>
