<?php
// With Help from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/
include("config.php");
$id = $_GET['id'];

$result = mysqli_query($mysqli, "INSERT INTO todocomplete SELECT * FROM todo WHERE
 id=$id ");


$result = mysqli_query($mysqli, "DELETE FROM todo WHERE id=$id");

header("Location:TaskList.php");
//end
?>