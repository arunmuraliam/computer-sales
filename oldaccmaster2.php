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
.style5 {font-size: 18px}
-->
</style></head>
<body>
<?php include ("p5.php"); ?>
<div id="Layer1" style="position:absolute; left:506px; top:156px; width:548px; height:510px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Old Product Registration </p>
    <form action="" method="post" enctype="multipart/form-data" name="form1">
      <table width="478" border="1" cellspacing="0" cellpadding="0">
	  
	   <?php
		$s1=$_POST["t1"];
		$list=$_POST["list"];
		$s2=$_POST["t2"];
		?>
        <tr>
          <td width="196"><span class="style5">Product Name</span></td>
          <td width="276"><?php echo $s1;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td height="28"><span class="style5">Type</span></td>
          <td><?php echo $list;  ?>&nbsp;</td>
        </tr>
        
        <tr>
          <td><span class="style5"> Picture </span></td>
          <td>selected</td>
        </tr>
        <tr>
          <td><span class="style5">Product Specification </span></td>
          <td><?php echo $s2;  ?>&nbsp;</td>
        </tr>
      </table>
	  
	  <?php
	  	
		include("connection.php");
		$oldpid="op100";
		$s=mysql_query("select * from oldproductreg order by oldpid desc");
			
		if($row=mysql_fetch_array($s))
		{
			$oldpid=$row[0];
		}
		$oldpid++;
		
		$filename = $_FILES["file"]["name"];
		$x = explode(".",$filename);
		$n = count($x);
		$n--;
		$ext = $x[$n];
		$filename = "$oldpid.$ext";
		move_uploaded_file($_FILES["file"]["tmp_name"], "./oldprdpic/$filename");
		
		$s = "insert into oldproductreg values('$oldpid','$s1','$list','$filename','$s2')";
		if(mysql_query($s))
		{
			echo "<b>Product added";
		}
		else
		{
			echo "<b>Product not added";
		}
		
	  
	  ?>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
<table width="1426" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="1044" height="94">&nbsp;</td>
    <td width="360">&nbsp;</td>
    <td width="22">&nbsp;</td>
  </tr>
  <tr>
    <td height="281">&nbsp;</td>
    <td valign="top"><?php echo "<img src='./oldprdpic/$filename' width='200' height='200'>";   ?>&nbsp;</td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="74">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
