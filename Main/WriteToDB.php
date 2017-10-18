<h2>Now I'm going to try to add to the database with a text box</h2>

<html>
<form method="post" name="input" action="WriteToDB.php" >
ID:<br/>
<input name="user" type="text"/><br/>
Username:<br/>
<input name="userpassword" type="text"/>
<input type="submit" name="Submit" value="insert" />
</form>
 
 <?php
// with help from http://www.phpsuperblog.com/php/insert-values-into-mysql-database-with-html-form-and-php/?user=&userpassword=&Submit=insert

mysql_connect("127.0.0.1", "jboyle", "") or die("Connection Failed");
mysql_select_db("customersdb")or die("Connection Failed");



$user = $_POST['user'];
$password = $_POST['userpassword'];

$query = "INSERT INTO users(id,username)VALUES('$user','$password')";

if(mysql_query($query)){
echo "inserted";}
else{
echo "fail";}


 ?> 