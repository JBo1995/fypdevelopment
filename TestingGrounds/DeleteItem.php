<?php


mysql_connect("127.0.0.1", "jboyle", "") or die("Connection Failed");
mysql_select_db("customersdb")or die("Connection Failed");
// Check connection
if (mysqli_connect_errno())
{
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}

if (!$result = mysqli_query($con,"SELECT * FROM users"))
{
    die("Error: " . mysqli_error($con));
}
?>
<table border='1'>
<tr>
<th>Title</th>
<th>Description</th>
</tr>
<?php
while($row = mysqli_fetch_array($result))
{
?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><a href="DeleteItem.php?id=<?php echo $row['id']; ?>">Delete</a></td>
</tr>
<?php
}
mysqli_close($con);
?>
</table>