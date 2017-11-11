<?php
include("config.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM todo WHERE id=$id");
 
header("Location:TaskList.php");
?>