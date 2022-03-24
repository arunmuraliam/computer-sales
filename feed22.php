<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<?php include("p2.php");  ?>
<table width="1585" border="0" cellpadding="0" cellspacing="0">

<?php
		include('connection.php');
		session_start();
		$custid=$_SESSION["cusid"];
		
		$s1=$_POST["t1"];
		
?>
  <!--DWLayoutTable-->
  <tr>
    <td width="529" height="88">&nbsp;</td>
    <td width="441">&nbsp;</td>
    <td width="615">&nbsp;</td>
  </tr>
  <tr>
    <td height="404">&nbsp;</td>
    <td valign="top"><form name="form1" method="post" action="">
        <table width="300" height="310" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td><div align="center"><strong>Your Feedback </strong></div></td>
          </tr>
          <tr>
            <td height="141"><div align="center">
              <textarea name="t1"><?php echo "$s1"; ?></textarea>
            </div></td>
          </tr>
          <tr>
            <td height="79"><div align="center">
              <?php
			  $fid=0;
			$s=mysql_query("select * from feedback order by fid desc");
			
			if($row=mysql_fetch_array($s))
			{
				$fid=$row[0];
			}
			$fid++;
			$fdate=date("y")."-".date("m")."-".date("d");
		
			$ss="insert into feedback(fid,feedback,fdate,custid) values('$fid','$s1','$fdate','$custid')";
			if(mysql_query($ss))
			{
			echo "Feedback send successfully";
			}
			else
			{
			echo "Not send";
			}

			   
			  ?>
            </div></td>
          </tr>
        </table>
    </form></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="121">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
