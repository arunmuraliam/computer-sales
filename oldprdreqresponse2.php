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
<?php include("p3.php");  ?>
<table width="1626" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="68" height="31">&nbsp;</td>
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
    <td height="139"></td>
    <td></td>
    <td colspan="5" valign="top"><div align="center">
        <p class="style1">Old Product Request from Customer </p>
        <form name="form1" method="post" action="oldprdreqresponse2.php">
          <?php
		  $reqno=$_POST["c1"];
		  ?><table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		    <?php
		  	include("connection.php");
			session_start();
			
			$staffid=$_SESSION["staffid"];
			$s=mysql_query("select * from oldsalereq where rstatus is null");
			
			if(mysql_num_rows($s)==0)
			{
				echo "<b>No Requests";
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
			  <?php
				}
			?>
            </tr>
		    
        </table>
        </form>
        <p class="style1">&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td></td>
  </tr>
  <tr>
    <td height="14"></td>
    <td colspan="2" rowspan="4" valign="top"><div align="center" class="style1"> 
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
          <tr>
            <td colspan="2"><div align="center" class="style4">Customer Details </div></td>
          </tr>
          <tr>
            <td><span class="style3">Name</span></td>
            <td><?php echo "$row1[0]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">House Name </span></td>
            <td><?php echo "$row1[1]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">Place</span></td>
            <td><?php echo "$row1[2]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">Pin</span></td>
            <td><?php echo "$row1[3]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">Phone</span></td>
            <td><?php echo "$row1[4]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">Location </span></td>
            <td><?php echo "$row1[5]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">State</span></td>
            <td><?php echo "$row1[6]"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">District</span></td>
            <td><?php echo "$row1[8]"; ?>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div></td>
    <td></td>
    <td rowspan="2" valign="top"><div align="center">
        <p class="style1">Items</p>
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
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="53">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" rowspan="2" valign="top"><form name="form2" method="post" action="oldprdreqresponse3.php">
        <table width="422" height="49" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <td width="157">Request Response </td>
            <td width="119"><p>
                <input name="r1" type="radio" value="y">
              Yes</p>
              <p>
                <input name="r1" type="radio" value="n" checked>
  No            </p></td>
            <td width="138"><input name="Submit" type="submit" id="Submit" value="Submit">
		    <?php echo "<input name='c1' type='hidden'  value='$reqno'>"; ?></td>
          </tr>
        </table>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="60">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="329">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="91">&nbsp;</td>
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
