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
.style3 {font-size: 18px}
.style4 {
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
</head>
<body>


<?php include ("p5.php"); ?>

<div id="Layer2" style="position:absolute; left:615px; top:126px; width:411px; height:417px; z-index:2; font-weight: bold; font-size: 24px;">
  <div align="center">
    <p>Supplier Registration </p>
    <form name="form12" method="post" action="supplier2.php">
      <table width="318" height="322" border="0" align="center" cellpadding="0" cellspacing="0">
	  <?php
		$s1=$_POST["t1"];
		$s2=$_POST["t2"];
		$s3=$_POST["t3"];
		$s4=$_POST["t4"];
		$s5=$_POST["t5"];
		$s6=$_POST["t6"];
		$s7=$_POST["t7"];
		$s8=$_POST["t8"];
		$s9=$_POST["t9"];
		$s10=$_POST["t10"];
		
		
		?>
        <tr>
          <td width="131" height="31"><div align="left" class="style3 style4">
              <div align="left">Supplier Name</div>
          </div></td>
          <td width="175"><?php echo $s1;  ?>&nbsp;
          </td>
        </tr>
		
        <tr>
          <td><div align="left" class="style3">
              <div align="left">Firm Name </div>
          </div></td>
          <td><?php echo $s2;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Firm Address </span></div></td>
          <td><?php echo $s3;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Location</span></div></td>
          <td><?php echo $s4;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Place</span></div></td>
          <td><?php echo $s5;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Pin Code </span></div></td>
          <td><?php echo $s6;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Phone</span></div></td>
          <td><?php echo $s7;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">State</span></div></td>
          <td><?php echo $s8;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">District</span></div></td>
          <td><?php echo $s9;  ?>&nbsp;
          </td>
        </tr>
        <tr>
          <td><div align="left"><span class="style3">Email</span></div></td>
          <td><?php echo $s10;  ?>&nbsp;
          </td>
        </tr>
      </table>
	  <?php
		  	$regdate=date("y")."-".date("m")."-".date("d");
			
			$supid="a100";
			include("connection.php");
			$s=mysql_query("select * from supplier order by supid desc");
			
			if($row=mysql_fetch_array($s))
			{
				$supid=$row[0];
			}
			$supid++;
			$s="insert into supplier values('$supid','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$regdate')";
			
			if(mysql_query($s))
			{
				echo "<br><b><font color='green'>Supplier inserted";
				
				
			}
			else
			{
				echo "<b><font color='red'>Supplier not inserted";
			} 
			
			$s="insert into login values('$supid','$supid')";
			
			if(mysql_query($s))
			{
				echo "<br><br><b>Supplierid and Password is $supid";
			}
			else
			{
				echo "<br><b><font color='red'>Supplierid and Password is not inserted";
			}	
			
		  ?>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
