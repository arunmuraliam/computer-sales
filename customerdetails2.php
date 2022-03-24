<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Customer</title>
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
.style1 {font-size: 18px}
-->
</style></head>
<body>
<?php include("p1.php");  ?>
<div id="Layer1" style="position:absolute; left:548px; top:92px; width:465px; height:449px; z-index:1; font-weight: bold; font-size: 20px;">
  <div align="center">
    <br><br><p>Customer Registration</p>
    <form name="form1" method="post" action="customerdetails2.php">
      <table width="319" height="254" border="0" cellpadding="0" cellspacing="0">
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
          <td width="152"><span class="style1">Name</span></td>
          <td width="161"><?php echo $s1;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style1">House Name</span></td>
          <td><?php echo $s2;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style1">Place</span></td>
          <td><?php echo $s3;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style1">Pin</span></td>
          <td><?php echo $s4;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style1">Phone</span></td>
          <td><?php echo $s5;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style1">Location</span></td>
          <td><?php echo $s6;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style1">State</span></td>
          <td><?php echo $s7;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><span class="style1">District</span></td>
          <td><?php echo $s8;  ?>&nbsp;</td>
        </tr>
        <tr>
          <td><div align="left"></div>            
            <div align="left" class="style1">Password</div></td>
          <td><?php echo $s9;  ?>&nbsp;</td>
        </tr>
      </table>
	  <br>
	   <?php
		  	$regdate=date("y")."-".date("m")."-".date("d");
			
			$cusid="c100";
			include("connection.php");
			$s=mysql_query("select * from customer order by cusid desc");
			
			if($row=mysql_fetch_array($s))
			{
				$cusid=$row[0];
			}
			$cusid++;
			$s = mysql_query("select * from customer where ph ='$s5'");
			if(mysql_num_rows($s)>0)
			{
			  echo  "<b><font color='red'>This customer already registered - with same phone number";
			  }
			  else{
			  
			  
			$s="insert into customer values('$cusid','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$regdate')";
			
			if(mysql_query($s))
			{
				echo "<br><b><font color='green'>Registered";
				
				
			}
			else
			{
				echo "<b><font color='red'>Customer not registered";
			} 
			
			$s="insert into login values('$cusid','$s9')";
			
			if(mysql_query($s))
			{
				echo "<br><br><b>CustomerID - $cusid and Password - $s9";
			}
			else
			{
				echo "<br><b><font color='red'>Customerid and Password is not inserted in login table.";
			}	
			
			}
		  ?>
      <p>&nbsp;</p>
      <p align="left">&nbsp;</p>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</body>
</html>
