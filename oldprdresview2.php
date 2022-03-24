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
.style3 {font-size: 18px}
.style4 {font-size: 22px}
-->
</style>
</head>

<body>
<?php include("p2.php");  ?>
<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="68" height="45">&nbsp;</td>
    <td width="254">&nbsp;</td>
    <td width="139">&nbsp;</td>
    <td width="27">&nbsp;</td>
    <td width="353">&nbsp;</td>
    <td width="38">&nbsp;</td>
    <td width="304">&nbsp;</td>
    <td width="125">&nbsp;</td>
    <td width="318">&nbsp;</td>
  </tr>
  <tr>
    <td height="157">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5" valign="top"><div align="center">
        <p class="style1">Old Product Request from Customer </p>
        <form name="form1" method="post" action="oldprdresview2.php">
          <?php
		  $reqno=$_POST["c1"];
		  ?><table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		    <?php
		  	include("connection.php");
			
			
			session_start();
			$cusid=$_SESSION["cusid"];
			$s=mysql_query("select * from oldsalereq where custid='$cusid' and reqno not in(select reqno from custsendreceiveproduct)");
			
			if(mysql_num_rows($s)==0)
			{
				//echo "<b>No Requests";
			} 
			else
			{
		  ?>
              <td width="181">Select Request No </td>
              <td width="102"><select name="c1" id="c1">
				    
				    <?php
					echo "<option>$reqno</option>";
						while($row=mysql_fetch_array($s)) 
						{
						if($reqno==$row[0])
						 continue;
							echo "<option>$row[0]</option>";
						} 
					?>
              </select></td>
              <td width="136"><input type="submit" name="Submit" value="View"></td>
			 
            </tr>
		    
        </table>
		 <?php
				}
			?>
        </form>
        <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="64">&nbsp;</td>
    <td colspan="2" rowspan="3" valign="top"><div align="center" class="style1"> 
	  <?php 
	$s=mysql_query("select * from oldsalereq where reqno='$reqno'");
	
	$row=mysql_fetch_array($s);
	$reqdate=$row[2];
	$cusid=$row[1];
	
	$ss=mysql_query("select * from customer where cusid='$cusid'");
	$row1=mysql_fetch_array($ss);
	
	?>
	  
      <p>Details </p>
        <table width="261" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="122"><span class="style3">Request Date </span></td>
            <td width="133"><?php echo "$reqdate"; ?>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td valign="top"><div align="center">
        <p><strong>Items</strong></p>
        <p>
          <?php
				
				
						$s=mysql_query("select * from oldsaleitems where reqno=$reqno");
						
						echo "<table border='1'> 
				<tr>
					<th>Item No</th>
					<th>Product ID</th>
					
					<th>Model</th>
					
					<th>Quantity</th>
					
					
				</tr>";
			while($row=mysql_fetch_array($s))		
			{
				echo "<tr>
						<td>$row[1]</td>
						<td>$row[2]</td>
						<td>$row[3]</td>
						<td>$row[4]</td>
						
						
					</tr>";
					
				
			}
		echo "</table>";
						
						
		   
			  	
			  ?>
&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="2" valign="top">
	<?php
	  $s=mysql_query("select * from oldsalereq where reqno='$reqno'");
	  if($row=mysql_fetch_array($s))
	  {
	  	$rstatus=$row[3];
		$rdate=$row[4];
		
	  }
	  if($rstatus==null)
	  {
	     echo "Please wait for the response";
		 }
		 else
		 {
		 
	  
	  
	  ?>
      <table width="422" height="98" border="1" cellpadding="0" cellspacing="0">
	  
	  
        <tr>
          <td width="157" height="65">Request Status </td>
          <td width="119"><p><?php if($rstatus="y")
		  {
		  echo "Yes";
		  }else { 
		  echo "No";
		  }
		  ?>&nbsp;
                </p>
            <p>&nbsp;
</p></td>
        </tr>
        <tr>
          <td>Request Date </td>
          <td><?php echo "$rdate"; ?>&nbsp;</td>
        </tr>
      </table>
	  <?php
	  }
	  ?>
    </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="70">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="228">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="160">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
