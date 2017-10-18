<html><body>
<?php
// A simple web site in Cloud9 that runs through Apache
// Press the 'Run' button on the top to start the web server,
// then click the URL that is emitted to the Output tab of the console

echo 'This is my environment test test test';



?>

<h1>This will be the landing page of my CRM which will be designed with HTML, CSS, Javascript</h1>

<h2>This is just me showing I can show the database</h2>



<?php
// The following is adapted from https://www.w3schools.com/PhP/php_mysql_select.asp
// It displays my database table simply
$host = "127.0.0.1";
    $user = "jboyle";                    
    $pass = "";                                  
    $db = "customersdb";                                
    $port = 3306;   

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "The ID is: " . $row['id'] . " and the Username is: " . $row['username']. " <br> "  ;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<h2>This is me trying to write to the database</h2>

<?php
$host = "127.0.0.1";
    $user = "jboyle";                    
    $pass = "";                                  
    $db = "customersdb";                                
    $port = 3306;   

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO users (id, username)
VALUES ('6', 'Doe')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<h2>Data showed in a table</h2>
<?php
// with help from https://www.w3schools.com/PhP/showphpfile.asp?filename=demo_db_select_oo_table
$host = "127.0.0.1";
    $user = "jboyle";                    
    $pass = "";                                  
    $db = "customersdb";                                
    $port = 3306;   

// Create connection
$conn = new mysqli($host, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql = "SELECT id, username FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?> 



</html>

</body>
</html>