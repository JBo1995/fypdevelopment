<?php
//including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/

include_once("Config.php");
 
if(isset($_POST['Submit'])) {    
    $Date = $_POST['Date'];
    $CustName = $_POST['CustName'];
     $Customerid = $_POST['Customerid'];
    $Items = $_POST['Items'];
     $Quantity = $_POST['Quantity'];
     $SubTotal = $_POST['SubTotal'];
    $Price = $_POST['Price'];
    $AmountPaid = $_POST['AmountPaid'];
     $AmountDue = $_POST['AmountDue'];
   
        
    // checking empty fields
    if(empty($Date) || empty($CustName) || empty($Customerid) || empty($Items) || empty($Quantity) || empty($Price) || empty($SubTotal) || empty($AmountPaid) || empty($AmountDue)) {                
        if(empty($Date)) {
            
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
        if(empty($CustName)) {
            
            echo "<font color='red'>Customer Name field is empty.</font><br/>";
        }
        if(empty($Customerid)) {
            
            echo "<font color='red'>Customer ID field is empty.</font><br/>";
        }
        if(empty($Items)) {
            
            echo "<font color='red'>Items field is empty.</font><br/>";
        }
        if(empty($Quantity)) {
            
            echo "<font color='red'>Quantity field is empty.</font><br/>";
        }
        if(empty($Price)) {
            
            echo "<font color='red'>Price field is empty.</font><br/>";
        }
       
        if(empty($SubTotal)) {
            
            echo "<font color='red'>SubTotal field is empty.</font><br/>";
        }
        if(empty($AmountPaid)) {
            
            echo "<font color='red'>Amount Paid field is empty.</font><br/>";
        }
        if(empty($AmountDue)) {
            
            echo "<font color='red'>Amount Due field is empty.</font><br/>";
        }
       
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO Invoices(Date,CustName,Customerid,Items,Quantity,SubTotal,Price,AmountPaid,AmountDue) VALUES('$Date','$CustName','$Customerid','$Items','$Quantity','$SubTotal','$Price','$AmountPaid','$AmountDue',)");
        
        echo "<font color='red'>Success</font><br/>";
    }
}
//end
?>