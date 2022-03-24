<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
body,
.bg
{
background-image:url("./back/images22.jpg");
background-repeat:no-repeat;
background-size: cover;
color: black;
background-position: inherit;
}

input[type=text],input[type=password]{
border-radius: 7px;
padding:7px;
background-color:#FFFF99;
color:#FF0000;



}
input[type=submit],input[type=reset]{
padding:10px;
background-color:#FFFFFF;
font-size: 14px;
margin: 10px;
width:auto;
border-radius:20px;
border: 1px solid #ff7101;
color:#FF0000;

}

textarea {
	
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
	border-radius: 8px;
	background-color:#FFFFCC;
	color:#FF0000;
}

select {
	
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
	border-radius: 8px;
	background-color:#FFFFCC;
	color:#FF0000;
}
</style>

<script  language="javascript">

function numbers(event)
{

var charCode=event.keyCode;
if(charCode>31&&(charCode<48||charCode>57))
return false;

}
function alphabets(event)
{
var charCode=event.keyCode;
if((charCode>=65&&charCode<=90)||(charCode>=97&&charCode<=122)||charCode==32)
return true;
else
return false;
}


function email(event)
{
var charCode=event.keyCode;
if((charCode>=65&&charCode<=90)||charCode==32)
return false;
else
return true;
}

</script>

</head>

<body>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr>
    <td width="100%" height="18" valign="top"><?php include("homemenu2.htm");  ?></td>
  <td width="5"></td>
  <td width="7"></td>
  </tr>
  <tr>
    <td height="185" colspan="2" valign="top"><img src="back/head.jpg" width="100%" height="185"></td>
    <td>&nbsp;</td>
  </tr>
  <tr bgcolor="#ff7101">
    <td height="18" colspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>
</body>
</html>
