<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<script>
function abc()
{

if(document.form1.t1.value=="" || document.form2.t2.value=="" ||document.form2.t3.value=="" ||document.form2.t4.value=="")
{
alert("Please enter All");
return(false);

}
if(document.form1.t1.value.length<1)
{
alert("enter quantity");
return(false);

}


}



</script>
<body>
<?php include("p4.php");  ?>
<table width="1585" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="529" height="88">&nbsp;</td>
    <td width="441">&nbsp;</td>
    <td width="615">&nbsp;</td>
  </tr>
  <tr>
    <td height="404">&nbsp;</td>
    <td valign="top"><form name="form1" onSubmit="return abc()" method="post" action="feed222.php">
        <table width="300" height="313" border="1" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="83"><div align="center"><strong>Your Feedback </strong></div></td>
          </tr>
          <tr>
            <td height="141"><div align="center">
              <textarea name="t1"></textarea>
            </div></td>
          </tr>
          <tr>
            <td height="87"><div align="center">
              <input type="submit" name="Submit" value="Send">
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
