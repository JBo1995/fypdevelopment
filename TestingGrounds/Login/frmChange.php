<?php
$_SESSION["userId"] = "24";
$conn = mysql_connect("127.0.0.1","jboyle","");
mysql_select_db("customersdb",$conn);
if(count($_POST)>0) {
$result = mysql_query("SELECT *from login WHERE user_id='" . $_SESSION["user-id"] . "'");
$row=mysql_fetch_array($result);
if($_POST["currentPassword"] == $row["password"]) {
mysql_query("UPDATE login set password='" . $_POST["newPassword"] . "' WHERE user_id='" . $_SESSION["user_id"] . "'");
$message = "Password Changed";
} else $message = "Current Password is not correct";
}
?>