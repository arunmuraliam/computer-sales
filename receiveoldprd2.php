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

<table width="1626" border="0" cellpadding="0" cellspacing="0"  >
  <!--DWLayoutTable-->
  <tr>
    <td width="31" height="45">&nbsp;</td>
    <td width="291">&nbsp;</td>
    <td width="21">&nbsp;</td>
    <td width="11">&nbsp;</td>
    <td width="324">&nbsp;</td>
    <td width="21">&nbsp;</td>
    <td width="300">&nbsp;</td>
    <td width="39">&nbsp;</td>
    <td width="145">&nbsp;</td>
    <td width="288">&nbsp;</td>
    <td width="155">&nbsp;</td>
  </tr>
  <tr>
    <td height="157">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="7" valign="top"><div align="center">
        <p class="style1">Old Product Request from Customer </p>
        <form name="form1" method="post" action="receiveoldprd2.php">
          <?php
		  $reqno=$_POST["c1"];
		  ?>
		  
		  <?php
		  	include("connection.php");
			session_start();
			
			$staffid=$_SESSION["staffid"];
			$s=mysql_query("select * from custsendreceiveproduct where rstatus is null");
			
			if(mysql_num_rows($s)==0)
			{
				echo "<b>No Requests";
			} 
			else
			{
		  ?>
		  
		  <table width="427" border="1" cellspacing="0" cellpadding="0">
            <tr>
		    
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
    <td height="34"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="30"></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><div align="center">
        <p class="style1">Products</p>
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
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td height="313"></td>
    <td colspan="2" rowspan="5" valign="top"><div align="center" class="style1">
        <p>
          <?php 
	$s=mysql_query("select * from oldsalereq where reqno='$reqno'");
	
	$row=mysql_fetch_array($s);
	$reqdate=$row[2];
	$cusid=$row[1];
	$rstatus=$row[3];
	$rdate=$row[4];
	
	$sss=mysql_query("select * from custsendreceiveproduct where reqno='$reqno'");
	$row2=mysql_fetch_array($sss);
	$smode=$row2[1];
	$sdetails=$row2[2];
	$sdate=$row2[3];
	
	$ss=mysql_query("select * from customer where cusid='$cusid'");
	$row1=mysql_fetch_array($ss);
	
	?>
        Details</p>
        <table width="244" height="222" border="1" cellpadding="0" cellspacing="0">
          <tr>
            <td width="116"><span class="style3">Request Date </span></td>
            <td width="122"><?php echo "$reqdate"; ?></td>
          </tr>
          <tr>
            <td><span class="style3">Response Date </span></td>
            <td><?php echo "$rdate"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td><span class="style3">Send Mode </span></td>
            <td><?php echo "$smode"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><div align="center"><span class="style3">Details</span></div></td>
          </tr>
          <tr>
            <td colspan="2"><form name="form3" method="post" action="">
              <div align="center">
                <textarea name="textarea"><?php echo "$sdetails"; ?></textarea>
              </div>
            </form></td>
          </tr>
          <tr>
            <td><span class="style3">Date</span></td>
            <td><?php echo "$sdate"; ?>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
    </div></td>
    <td></td>
    <td rowspan="4" valign="top"><div align="center" class="style1">
        <table width="261" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td colspan="2"><div align="center" class="style4">Customer Details </div></td>
          </tr>
          <tr>
            <td width="122"><span class="style3">Name</span></td>
            <td width="133"><?php echo "$row1[0]"; ?>&nbsp;</td>
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
    <td></td>
    <td colspan="2" rowspan="3" valign="top"><form name="form2" method="post" action="receiveoldprd3.php">
        <table width="422" height="214" border="1" cellpadding="0" cellspacing="0">
          <!--DWLayoutTable-->
          <tr>
            <td width="215">Request Status </td>
            <td width="201"><p align="center">
                <input name="r1" type="radio" value="y">
          Yes
          <input name="r1" type="radio" value="n" checked>
          No </p>
              <p>&nbsp; </p></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center"><strong>Details</strong></div></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
                <textarea name="t1" id="t1"></textarea>
            </div></td>
          </tr>
          <tr>
            <td height="38" colspan="2"><div align="center">
                <input type="submit" name="Submit2" value="Submit">
				<?php echo "<input type='hidden' name='c1' value='$reqno'>"; ?>
            </div></td>
          </tr>
         
        </table>
    </form></td>
    <td></td>
  </tr>
  <tr>
    <td height="30"></td>
    <td></td>
    <td></td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
  </tr>

</table>
</body>
</html>
