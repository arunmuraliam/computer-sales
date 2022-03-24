<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Staff Registration</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>

<?php include ("p5.php"); ?>
<table align="center" width="528" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="28" height="63">&nbsp;</td>
    <td width="489">&nbsp;</td>
    <td width="11">&nbsp;</td>
  </tr>
  <tr>
    <td height="499">&nbsp;</td>
    <td valign="top">      <p align="center" class="style1">Staff Registration</p>      <form name="form1" method="post" action="staffreg2.php">
        <?php
		$s1=$_POST["t1"];
		$s2=$_POST["t2"];
		$s3=$_POST["t3"];
		$s4=$_POST["t4"];
		$s5=$_POST["t5"];
		$s6=$_POST["t6"];
		$s7=$_POST["t7"];
		$s8=$_POST["r1"];
		$s9=$_POST["t8"];
		$s10=$_POST["t9"];
		$s11=$_POST["t10"];
		
		
		?>
        <div align="center">
          <table width="295" border="0" cellpadding="0" cellspacing="0" >
		        
          <tr>
              <td width="118">Name </td>
              <td width="171"><?php echo $s1;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>House Name </td>
              <td><?php echo $s2;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Place</td>
              <td><?php echo $s3;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Pin Code </td>
              <td><?php echo $s4;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Phone</td>
              <td><?php echo $s5;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>State</td>
              <td><?php echo $s6;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>District</td>
              <td><?php echo $s7;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Gender</td>
              <td><?php echo $s8;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?php echo $s9;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Qualification</td>
              <td><?php echo $s10;  ?>&nbsp;</td>
            </tr>
            <tr>
              <td>Date Of Birth </td>
              <td><?php echo $s11;  ?>&nbsp;</td>
            </tr>
            <tr>
			      
          <tr>
              <td colspan="2"><div align="center">
              </div></td>
            </tr>
          </table>
          <?php
		  	$regdate=date("y")."-".date("m")."-".date("d");
			
			$staffid="s100";
			include("connection.php");
			$s=mysql_query("select * from staff order by staffid desc");
			
			if($row=mysql_fetch_array($s))
			{
				$staffid=$row[0];
			}
			$staffid++;
			$s="insert into staff values('$staffid','$s1','$s2','$s3','$s4',$s5,'$s6','$s7','$s8','$s9','$s10','$s11','$regdate')";
			
			if(mysql_query($s))
			{
				echo "<br><b><font color='green'>Staff inserted";
				
				
			}
			else
			{
				echo "<b><font color='red'>Staff not inserted";
			} 
			
			$s="insert into login values('$staffid','$staffid')";
			
			if(mysql_query($s))
			{
				echo "<br><br><b>Staffid and Password is $staffid";
			}
			else
			{
				echo "<br><b><font color='red'>Staffid and Password is not inserted";
			}	
			
		  ?>
        </div>
    </form>      <p align="center" class="style1">&nbsp;</p>      <p align="center" class="style1">&nbsp;</p></td><td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
