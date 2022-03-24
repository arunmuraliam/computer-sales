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
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form1.t2.value=="" ||document.form1.t3.value=="" ||document.form1.t4.value==""
||document.form1.t5.value==""||document.form1.t6.value==""||document.form1.t7.value==""||document.form1.t8.value==""||document.form1.t8.value==""||document.form1.t10.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t4.value.length<6)
{
alert("Pin should be exact 6 digits");
return(false);

}
if(document.form1.t5.value.length<10)
{
alert("Phone  should be Min 10 digits");
return(false);

}


}



</script>
</head>
<body>
<?php include("p5.php");  ?>
<div id="Layer1" style="position:absolute; left:31px; top:146px; width:533px; height:372px; z-index:-1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Feedback Reply </p>
    
	<?php
		include('connection.php');
		session_start();
		//$supid=$_SESSION["supid"];
		
		$s1=$_POST["t1"];
		//$s="delete from temp3 ";
		//mysql_query($s);
		
		$s=mysql_query("select * from feedback where supid is not null and reply is null" );
		if(mysql_num_rows($s)==0)
		{
			echo "<b>No Feedbacks";
		} 
		else
		{
			echo "<table border='1' width='100%'>
					<tr>
						<th>Feedback ID</th>
						<th>Feedback Date</th>
						<th>Supplier ID</th>
						<th></th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[2]</td>
						<td>$row[6]</td>
						<td align='center'>
							<form action='feedreply222.php' method='post'>
								<input type='submit' name='Submit' value='View'>
								<input type='hidden' name='t1' value='$row[0]'>
								
							</form
						</td>
					</tr>";
			}	
			echo "</table>";	
		}
	?>
  </div>
</div>
<table width="1431" height="419" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  
  <?php
  
  $s=mysql_query("select * from feedback where fid='$s1'");
  $row=mysql_fetch_array($s);
  $feedback=$row[1];
  $fdate=$row[2];
  $supid=$row[6];
  ?>
  <tr>
    <td width="574" height="111">&nbsp;</td>
    <td width="266">&nbsp;</td>
    <td width="14">&nbsp;</td>
    <td width="303">&nbsp;</td>
    <td width="15">&nbsp;</td>
    <td width="259">&nbsp;</td>
  </tr>
  <tr>
    <td height="286">&nbsp;</td>
    <td rowspan="2" valign="top"><div align="center">
        <p><strong>Details</strong></p>
        <table width="200" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="100">FID</td>
            <td width="94"><?php echo "$s1";?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">Feedback</div></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              
              <textarea name="textarea"><?php echo "$feedback";?></textarea>
              
          </div></td>
          </tr>
          <tr>
            <td>Date</td>
            <td><?php echo "$fdate";?>&nbsp;</td>
          </tr>
        </table>
        <p>&nbsp;</p>
    </div></td>
    <td>&nbsp;</td>
    <td rowspan="2" valign="top"><div align="center">
        <p><strong>Supplier Details </strong></p>
        <table width="229" border="1" cellspacing="0" cellpadding="0">
	    <?php
	  $ss=mysql_query("select * from supplier where supid='$supid'");
	  $row1=mysql_fetch_array($ss);
	  $name=$row1[1];
	  $fname=$row1[2];
	  $faddr=$row1[3];
	  $place=$row1[5];
	  $pin=$row1[6];
	  $phone=$row1[7];
	  $district=$row1[9];
	  $state=$row1[8];
	  
	  ?>
          <tr>
            <td width="106">Staff ID </td>
            <td width="88"><?php echo "$supid"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Name</td>
            <td><?php echo "$name"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Firm Name </td>
            <td><?php echo "$fname"; ?>&nbsp;</td>
          </tr>
		  <tr>
            <td>Firm Address </td>
            <td><?php echo "$faddr"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Place</td>
            <td><?php echo "$place"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Pin</td>
            <td><?php echo "$pin"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>Phone</td>
            <td><?php echo "$phone"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td>State</td>
            <td><?php echo "$state"; ?>&nbsp;</td>
          </tr>
          <tr>
            
		  <td>District</td>
            <td><?php echo "$district"; ?>&nbsp;</td>
          </tr>
        </table>
        <p><strong></strong></p>
    </div></td>
    <td>&nbsp;</td>
    <td valign="top"><div align="center">
        <p><strong>Reply</strong></p>
        <form name="form1" method="post" onSubmit="return abc()" action="feedreply333.php">
          <p>
            <textarea name="t2" id="t2"></textarea>
      </p>
          <p>
            <input type="submit" name="Submit" value="Send">
		    <?php echo "<input type='hidden' name='t1' value='$s1'>"; ?>
  </p>
        </form>
        <p><strong></strong></p>
    </div></td>
  </tr>
  <tr>
    <td height="92">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
