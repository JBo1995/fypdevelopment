
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



// $databaseHost = '127.0.0.1';
// $databaseName = 'customersdb';
// $databaseUsername = 'jboyle';
// $databasePassword = '';
 
 
 
 
  $databaseHost = 'eu-cdbr-west-02.cleardb.net';
 $databaseName = 'heroku_23c2d875b54b1b3';
 $databaseUsername = 'b3962ea13e429c';
$databasePassword = 'b7500ce5';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 




?>