<html>
<head>
    <title>Add Data</title>
</head>
 
<body>
<?php
//including the database connection file
include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $CustName = $_POST['CustName'];
    $CustContact = $_POST['CustContact'];
    $TaskNum = $_POST['TaskNum'];
    $Paid = $_POST['Paid'];
        
    // checking empty fields
    if(empty($CustName) || empty($CustContact) || empty($TaskNum) || empty($Paid)) {                
        if(empty($CustName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($CustContact)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($TaskNum)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
         if(empty($Paid)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO Customers(CustName,CustContact,TaskNum,Paid) VALUES('$CustName','$CustContact','$TaskNum','$Paid')");
        
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
</body>
</html>