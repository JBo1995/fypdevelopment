<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DevLink</title>
<!-- Design by https://dcrazed.com/css-html-login-form-templates/ -->
<style>


body{
  font-family: 'Open Sans', sans-serif;
  
   
   background-color: #cccccc;
  margin: 0 auto 0 auto;  
  width:100%; 
  text-align:center;
  margin: 20px 0px 20px 0px;   
}

p{
  font-size:12px;
  text-decoration: none;
  color:#ffffff;
}

h1{
  font-size:1.5em;
  color:#525252;
}

.box{
  background:white;
  width:300px;
  border-radius:6px;
  margin: 0 auto 0 auto;
  padding:0px 0px 70px 0px;
  border: #2980b9 4px solid; 
}

.email{
  background:#ecf0f1;
  border: #ccc 1px solid;
  border-bottom: #ccc 2px solid;
  padding: 8px;
  width:250px;
  color:#AAAAAA;
  margin-top:10px;
  font-size:1em;
  border-radius:4px;
}

.password{
  border-radius:4px;
  background:#ecf0f1;
  border: #ccc 1px solid;
  padding: 8px;
  width:250px;
  font-size:1em;
}

.btn{
  background:#2ecc71;
  width:125px;
  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #27ae60 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  float:left;
  margin-left:16px;
  font-weight:800;
  font-size:0.8em;
}

.btn:hover{
  background:#2CC06B; 
}

#btn2{
  float:center;
  background:#3498db;
  width:125px;  padding-top:5px;
  padding-bottom:5px;
  color:white;
  border-radius:4px;
  border: #2980b9 1px solid;
  
  margin-top:20px;
  margin-bottom:20px;
  margin-left:10px;
  font-weight:800;
  font-size:0.8em;
}

#btn2:hover{ 
background:#3594D2; 
}</style>
</head>
<body>
<div><h2>Welcome to DevLink</h2></div>
<br><br><br><br>



<form name="" method="post" class="form-control">
<div class="box">
<h1>Developer Login </h1>
<h6>UserName</h6>
<input name="username" type="text" id="username" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />
  <h6>Password</h6>
<input name="password" type="password" id="password" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email" />
<h6>Team Number</h6>
<input name="team" type="text" id="team" onFocus="field_focus(this, 'email');" onblur="field_blur(this, 'email');" class="email"  oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" onKeyDown="if(this.value.length==10 && event.keyCode!=8) return false;"/>
  
<input type="submit" name="submit" value="Login" id="btn2"> 


  
</div> <!-- End Box -->
  
</form>
<?php
if (isset($_POST['submit']))
	{	  
include("config2.php");

session_start();

$username=$_POST['username'];
$password=$_POST['password'];
$team =$_POST['team'];

$_SESSION['login_user']=$username;
$_SESSION['login_team']=$team;
 
$query = mysql_query("SELECT username FROM login WHERE username='$username' and password='$password' and team='$team'");

 if (mysql_num_rows($query) != 0)
{

 echo "<script language='javascript' type='text/javascript'> location.href='DeveloperPanel.php' </script>";	
  }

  else
  {
echo "<script type='text/javascript'>alert('User Name Or Password or Team Invalid!')</script>";
}

}
    
?>

   
</body>
</html>
