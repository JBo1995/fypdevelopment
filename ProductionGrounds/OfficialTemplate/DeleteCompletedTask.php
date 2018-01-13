<?php
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/
include("config.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM todocomplete WHERE id=$id");
 
header("Location:DeveloperPanel.php");
//end
?>