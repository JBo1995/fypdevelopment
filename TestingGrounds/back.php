
<?php
//including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/

include_once("Config.php");
 
if(isset($_POST['Submit'])) {    
    $Date = $_POST['Date'];
    $CustName1 = $_POST['CustName1'];
     $Customerid = $_POST['Customerid'];
    $Items = $_POST['Items'];
     $Quantity = $_POST['Quantity'];
    $Price = $_POST['Price'];
     $SubTotal = $_POST['SubTotal'];
    $AmountPaid = $_POST['AmountPaid'];
     $AmountDue = $_POST['AmountDue'];
   
        
    // checking empty fields
    if(empty($Date) || empty($CustName1) || empty($Customerid) || empty($Items) || empty($Quantity) || empty($Price) || empty($SubTotal) || empty($AmountPaid) || empty($AmountDue) || empty($Customer)) {                
        if(empty($Date)) {
            
            echo "<font color='red'>Date field is empty.</font><br/>";
        }
        if(empty($CustName1)) {
            
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
            
            echo "<font color='red'>Subtotal field is empty.</font><br/>";
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
        $result = mysqli_query($mysqli, "INSERT INTO Invoices(Date,CustName1,Customerid,Items,Quantity,Price,SubTotal,AmountPaid,AmountDue) VALUES('$Date','$CustName1','$Customerid','$Items','$Quantity','$Price','$SubTotal','$AmountPaid','$AmountDue',)");
        
        echo "<font color='red'>Success</font><br/>";
    }
}
//end
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <!-- /https://css-tricks.com/html-invoice/ -->

<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
	
	<title>Editable Invoice</title>
	
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>
    <?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","root") 
            or die("cannot connected");
 
// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test",$conn);
*/
 
/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */
 
$databaseHost = '127.0.0.1';
$databaseName = 'customersdb';
$databaseUsername = 'jboyle';
$databasePassword = '';
 
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName); 
?>
<form action="InvoiceView.php" method="post" name="form1">
	<div id="page-wrap">

		<h3>DevLink Invoice</h3>
		
		<div id="identity">
		
            
 <td>Customer Name : </td>
               
                <td>
                <?php
// With help from http://jsfiddle.net/My7D5/ & https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/7
$conn = new mysqli('127.0.0.1', 'jboyle', '', 'customersdb') 
or die ('Cannot connect to db');

    $result = $conn->query("select id, CustName from Customers");
    
    echo "<html>";
    echo "<body>";
    echo "<select class='btn btn-primary dropdown-toggle'  id='CustName1' onchange='copyValue()'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $CustName);
                  $id = $row['id'];
                  $name = $row['CustName']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
                 
}

    echo "</select>";
    echo "</body>";
    echo "</html>";
?><br><br><td>Customer ID : </td><input type="text" id="Customerid" readonly="readonly" ></td>

<script>function copyValue() {
    var dropboxvalue = document.getElementById('CustName1').value;
    document.getElementById('Customerid').value = dropboxvalue;
}</script>


            
		
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">

            

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><textarea>000123</textarea></td>
                </tr>
                <tr>

                    <td class="meta-head" >Date</td>
                    <td><textarea id="date" name="Date">December 15, 2009</textarea></td>
                </tr>
                <tr>
                    <td class="meta-head" name="AmountDue">Amount Due</td>
                    <td><div class="due" id="AmountDue">$875.00</div></td>
                </tr>

            </table>
		
		</div>
		
		<table id="items">
		
		  <tr>
		      <th>Item</th>
		      <th>Description</th>
		      <th>Unit Cost</th>
		      <th>Quantity</th>
		      <th>Price</th>
		  </tr>
		  
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>What is the item</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td class="description"><textarea>What is the customer paying for</textarea></td>
		      <td><textarea class="cost">$650.00</textarea></td>
		      <td><textarea class="qty" id="Quantity"name="Quantity">1</textarea></td>
		      <td><span class="price" id="Price">$650.00</span></td>
		  </tr>
		  
		  
		  
		 
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line" >Subtotal</td>
		      <td class="total-value"><div name="SubTotal" id="SubTotal">$875.00</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">$875.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line" >Amount Paid</td>

		      <td class="total-value"><textarea id="AmountPaid">$0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div id="AmountDue" class="due">$875.00</div></td>
		  </tr>
		
		</table>
		
		
		 
		  <td><input type="submit" name="Submit" value="Send"></td><br><br>
		</div>
	</form>
	</div>
	
</body>

</html>