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
</head>
<body>
<?php include("p2.php");  ?>
<div id="Layer1" style="position:absolute; left:87px; top:148px; width:442px; height:441px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p>Feedback Reply </p> </div>
    
	<?php
		include('connection.php');
		session_start();
		$custid=$_SESSION["cusid"];
		$s1=$_POST["t1"];
		
		//$s="delete from temp3 ";
		//mysql_query($s);
		
		$s=mysql_query("select * from feedback where custid='$custid'" );
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
						
						<th></th>
					</tr> ";
			while($row=mysql_fetch_array($s))
			{
				echo "<tr>
						<td>$row[0]</td>
						<td>$row[2]</td>
						
						<td align='center'>
							<form action='feedreplyview22.php' method='post'>
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
<table width="1327" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutDefaultTable-->
  <tr>
    <td width="540" height="119">&nbsp;</td>
    <td width="394">&nbsp;</td>
    <td width="335">&nbsp;</td>
    <td width="58">&nbsp;</td>
  </tr>
  <tr>
    <td height="33">&nbsp;</td>
    <td rowspan="3" valign="top"><div align="center">
        <table width="240" height="243" border="1" cellpadding="0" cellspacing="0">
	    
	  <?php
	  	$ss=mysql_query("select * from feedback where fid='$s1'");
		$row=mysql_fetch_array($ss);
		$feedback=$row[1];
		$fdate=$row[2];
		$reply=$row[3];
		$rdate=$row[4];
		
	   ?>
          <tr>
            <td width="120">Feedback ID </td>
            <td width="114"><?php echo "$s1"; ?>&nbsp;</td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">Feedback</div></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
              
              <textarea name="textarea"><?php echo "$feedback"; ?></textarea>
              
          </div></td>
          </tr>
          <tr>
            <td height="57">Date</td>
            <td><?php echo "$fdate"; ?>&nbsp;</td>
          </tr>
        </table>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="353">&nbsp;</td>
    <td valign="top"><div align="center">
        <?php
	  if($reply==null)
	    echo "<b>Please wait for the Reply";
		else
		{
	  ?><table width="227" height="194" border="1" cellpadding="0" cellspacing="0">
	    
        <tr>
            <td colspan="2"><div align="center">Reply</div></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
             
              <textarea name="textarea2"><?php echo "$reply"; ?></textarea>
              
          </div></td>
          </tr>
          <tr>
            <td width="112">Date</td>
            <td width="109"><?php echo "$rdate"; ?>&nbsp;</td>
          </tr>
        </table><?php } ?>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div></td>
  <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="59">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
