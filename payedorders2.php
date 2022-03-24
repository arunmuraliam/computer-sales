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
<style type="text/css">
<!--
.style1 {font-size: 20px}
.style3 {font-size: 24px}
.style4 {font-size: 18px}
.style5 {	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>
<script>
function abc()
{

if(document.form1.t2.value=="" || document.form2.t2.value=="" ||document.form2.t3.value=="" ||document.form2.t4.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t2.value.length<1)
{
alert("enter quantity");
return(false);

}


}



</script>

<body>
<?php include("p4.php");  ?>
<?php
$s1=$_POST["c1"];
?>  
<div id="Layer1" style="position:absolute; left:463px; top:129px; width:676px; height:151px; z-index:1; font-size: 24px; font-weight: bold;">
  <div align="center">
    <p class="style3">Product Delivery </p>
	<form name="form1" method="post" action="payedorders2.php">
  <table width="447" height="63" border="1" cellpadding="0" cellspacing="0">
	
      <tr>
        <td width="199"><span class="style1">Select Order </span></td>
        <td width="129">
          <select name="c1" id="c1">
            <?php 
				include("connection.php");
				session_start();
				$supid=$_SESSION["supid"];
				$s=mysql_query("select * from ordermaster where supid='$supid' and total is not null and ordno in(select ordno from paytosupplier) and ordno not in(select ordno from delivery) ");
				echo "<option>$s1</option>";
				while($row=mysql_fetch_array($s))
				{
					echo "<option>$row[0]</option>";
				}
			?>
          </select></td>
        <td width="111">
          <input name="Submit" type="submit" id="Submit" value="View">
        </td>
      </tr>
	  
    </table>
	</form>
    <p>&nbsp;</p>
  </div>
</div>
<div align="center">
  <div id="Layer3" style="position:absolute; left:579px; top:308px; width:312px; height:222px; z-index:3; font-size: 24px; font-weight: bold;">
    <div align="center">
      <p>Payment Details </p>
      <?php
	  		$s=mysql_query("select * from paytosupplier where ordno='$s1'");
			$row=mysql_fetch_array($s);
	  ?>
      <table width="198" height="88" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th width="97" scope="row"><span class="style4">Card No </span></th>
          <td width="97"><?php echo "$row[1]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><span class="style4">Pay Date</span></th>
          <td><?php echo "$row[2]"; ?>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </div>
  </div>
  <div id="Layer4" style="position:absolute; left:1005px; top:307px; width:353px; height:262px; z-index:4">
    <div align="center" class="style5">
      <p>Delivery</p>
      <form name="form1" method="post" onSubmit="return abc()" action="payedorders3.php">
        <table width="341" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td width="128"><span class="style4">Delivery Mode </span></td>
            <td width="207"><select name="t1" id="t1"><option>Parcel</option><option>Courier</option><option>By Hand</option></select></td>
          </tr>
          <tr>
            <td><span class="style4">Delivery Details</span></td>
            <td><textarea name="t2" id="t2"></textarea></td>
          </tr>
          <tr>
            <td colspan="2"><div align="center">
                <input type="submit" name="Submit2" value="Submit">
                <input type="reset" name="Submit3" value="Reset">
            </div></td>
          </tr>
        </table>
		<?php
		echo "<input type='hidden' name='c1' value='$s1'>";
		?>
      </form>
      <p>&nbsp;</p>
    </div>
  </div>
  <div id="Layer3" style="position:absolute; left:165px; top:306px; width:312px; height:222px; z-index:3; font-size: 24px; font-weight: bold;">
    <div align="center">
      <p>Order Details </p>
      <?php
	  include("connection.php");
	  		$s=mysql_query("select * from ordermaster where ordno='$s1'");
			$row=mysql_fetch_array($s);
			$supid=$row[1];
	  ?>
      <table width="198" height="60" border="1" cellpadding="0" cellspacing="0">
        <tr>
          <th width="97" scope="row"><div align="left"><span class="style4">Order No </span></div></th>
          <td width="97"><?php echo "$s1"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left" class="style4">Supplier ID </div></th>
          <td><?php echo "$row[1]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style4">Order Status </span></div></th>
          <td><?php if($row[3]=="y"){ echo "yes";}else { echo "no"; }?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left" class="style4">Order Date </div></th>
          <td><?php echo "$row[4]"; ?>&nbsp;</td>
        </tr>
        <tr>
          <th scope="row"><div align="left"><span class="style4">Total</span></div></th>
          <td><?php echo "$row[5]"; ?>&nbsp;</td>
        </tr>
      </table>
      <p>&nbsp;</p>
    </div>
  </div>
</div>
</body>
</html>
