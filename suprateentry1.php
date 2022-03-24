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
<?php include("p4.php");  ?>
<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="322" height="95">&nbsp;</td>
    <td width="861">&nbsp;</td>
    <td width="443">&nbsp;</td>
  </tr>
  <tr>
    <td height="204">&nbsp;</td>
    <td valign="top"><div align="center">
      <p class="style1">New Order Rate Entry </p>
      <form name="form1" method="post" action="suprateentry2.php">
        <table width="427" border="1" cellspacing="0" cellpadding="0">
          <tr>
		  <?php
		  	include("connection.php");
			session_start();
			$supid=$_SESSION["supid"];
			$s=mysql_query("select * from ordermaster where supid='$supid' and total is null");
			if(mysql_num_rows($s)==0)
			{
				echo "<b>No Orders";
			} 
			else
			{
		  ?>
            <td width="181">Select Order No </td>
            <td width="102"><select name="c1" id="c1">
					<option>Select Order No</option>
					<?php
						while($row=mysql_fetch_array($s)) 
						{
							echo "<option>$row[0]</option>";
						} 
					?>
            </select></td>
            <td width="136"><input type="submit" name="Submit" value="View"></td>
			<?php
				}
			?>
          </tr>
		  
        </table>
      </form>
      <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="345">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
