<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
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
<?php include("p5.php"); ?>
<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="322" height="45">&nbsp;</td>
    <td width="861">&nbsp;</td>
    <td width="443">&nbsp;</td>
  </tr>
  <tr>
    <td height="121">&nbsp;</td>
    <td valign="top"><div align="center">
        <p class="style1">Old Product Payment Details </p>
        <form name="form1" method="post" action="oldprdpaytocustomer2.php">
		 <?php
		  	include("connection.php");
			session_start();
			//$staffid=$_SESSION["staffid"];
			$s=mysql_query("select * from custsendreceiveproduct where rstatus is not null and paydate is null");
			if(mysql_num_rows($s)==0)
			{
				echo "<b>No Item Found";
			} 
			else
			{
		   ?>
          <table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		   
              <td width="181">Select Request No </td>
              <td width="102"><select name="c1" id="c1">
				    <option>Select </option>
				    <?php
						while($row=mysql_fetch_array($s)) 
						{
							echo "<option>$row[0]</option>";
						} 
					?>
              </select></td>
              <td width="136"><input type="submit" name="Submit" value="View"></td>
			  
            </tr>
		    
        </table>
		<?php
		//echo "<input type='hidden' name='c1' value='$row[0]'>";
				}
			?>
        </form>
        <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="478">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
