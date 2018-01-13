<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>
<body>

<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="" method="post">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3" align="center"><strong>User Login </strong></td>
</tr>
<tr>
<td width="1000">Name</td>
<td width="6">:</td>
<td width="294"><input name="CustName" type="text" id="CustName"></td>
</tr>
<tr>
<td>Your Unique ID</td>
<td>:</td>
<td><input name="id" type="password" id="id"></td>
</tr>
<tr>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td><input type="submit" name="submit" value="Login">
<input type="reset" name="reset" value="reset"></td>
</form>
</tr>
</table>
</td>

</tr>
</table>
<?php
if (isset($_POST['submit']))
	{	  
include("config2.php");

session_start();

$CustName=$_POST['CustName'];
$id=$_POST['id'];

$_SESSION['login_userid']=$id;
$_SESSION['login_user']=$CustName;


 
$query = mysql_query("SELECT CustName FROM Customers WHERE CustName='$CustName' and id='$id'");

 if (mysql_num_rows($query) != 0)
{

 echo "<script language='javascript' type='text/javascript'> location.href='CustomerPanel.php' </script>";	
  }

  else
  {
echo "<script type='text/javascript'>alert('User Name Or id Invalid!')</script>";
}

}
    
?>
						
			</article>								
	</main>
      </div>
    </div>
   
  </div>
</body>
</html>
