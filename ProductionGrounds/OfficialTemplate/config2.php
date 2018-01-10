<?php
	$hostname='127.0.0.1';
	$user = 'jboyle';
	$password = '';
	$mysql_database = 'customersdb';
	$db = mysql_connect($hostname, $user, $password,$mysql_database);
	mysql_select_db("customersdb", $db);
?>