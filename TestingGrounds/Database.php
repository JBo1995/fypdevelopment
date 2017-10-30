<?php
    
    //Connect to the database :  https://community.c9.io/t/connecting-php-to-mysql/1606
    $host = "127.0.0.1";
    $user = "jboyle";                    
    $pass = "";                                  
    $db = "customersdb";                                
    $port = 3306;                           
    
    $connection = mysqli_connect($host, $user, $pass, $db, $port)or die(mysql_error());



    //And now to perform a simple query to make sure it's working
    $query = "SELECT * FROM users";
    $result = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "The ID is: " . $row['id'] . " and the Username is: " . $row['username'];
    }

?>