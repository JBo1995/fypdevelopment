<?php
include("config.php");
$id = $_GET['id'];

$result = mysqli_query($mysqli, "INSERT INTO todocomplete SELECT * FROM todo WHERE
 id=$id ");


$result = mysqli_query($mysqli, "DELETE FROM todo WHERE id=$id");




header("Location:TaskList.php");
?>