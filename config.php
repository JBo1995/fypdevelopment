
<?php 
$conn = new mysqli("5.9.144.131","root","Tangoronan123!","customersdb");
if($conn->connect_error) {
  die($conn->connect_error);
}
?>
<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
            or die("cannot connected");
 
// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);
*/
 
/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */
 
//$databaseHost = 'eu-cdbr-west-02.cleardb.net';
//$databaseName = 'heroku_270227d55cb711a';
//$databaseUsername = 'b17b65ba76a357';
//$databasePassword = 'bfe87dc1';
 
//$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 



//$databaseHost = '127.0.0.1';
//$databaseName = 'customersdb';
//$databaseUsername = 'jboyle';
//$databasePassword = '';
 
//$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 

?>