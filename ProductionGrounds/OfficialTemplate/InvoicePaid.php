<?php
// With Help from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/
include("config.php");
$id = $_GET['id'];

$result = mysqli_query($mysqli, "INSERT INTO PaidInvoices SELECT * FROM Invoices WHERE
 id=$id ");


$result = mysqli_query($mysqli, "DELETE FROM Invoices WHERE id=$id");

header("Location:ViewInvoices.php");
//end
?>