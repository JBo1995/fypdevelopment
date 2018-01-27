
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
    echo "<select class='btn btn-primary dropdown-toggle' name='CustName' id='CustName' onchange='copyValue()'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $CustName);
                  $id = $row['id'];
                  $name = $row['CustName']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
                 
}

    echo "</select>";
    echo "</body>";
    echo "</html>";
?><br><br><td>Customer ID : </td><input type="text" name='Customerid' id="Customerid" readonly="readonly" ></td>

<script>function copyValue() {
    var dropboxvalue = document.getElementById('CustName').value;
    document.getElementById('Customerid').value = dropboxvalue;
}</script>


            
		
		</div>
		
		<div ></div>
		
		<div>

            

            <table >
                
                <tr>

                    <td class="meta-head" >Date</td>
                    <td><input type="text" id="Date" name="Date"></td>
                </tr>
                <tr>
                    <td name="AmountDue">Amount Due</td>
                    <td><input type="text" name="AmountDue1" id="AmountDue1">
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
		      <td ><div class="delete-wpr"><input name="Items"></div></td>
		      <td ><input type="text"></td>
		      <td><input  type="text" id="Cost" name="Cost"></td>
		      <td><input  type="text" id="Quantity" name="Quantity" onblur="MyValidation()" ></td>
		      <td ><input type="text" name="Price" id="Price"  ></td>
		      
		      
		        <tr>
		      <td colspan="2" > </td>
		      <td colspan="2" >Total</td>
		      <td><input type="text" id="SubTotal" name="SubTotal" ></td>
		  </tr>
		  
		  
		  
		  <tr>
		      <td colspan="2" > </td>
		      <td colspan="2" >Amount Paid</td>

		      <td ><input type="text" name="AmountPaid" id="AmountPaid" ></td>
		  </tr>
		  <tr>
		      <td colspan="2" > </td>
		      <td colspan="2" >Balance Due</td>
		      <td><input type="text" id="AmountDue" name="AmountDue" ></td>
		  </tr>
		</table>
		  <td><input type="Submit" name="Submit" value="Send"></td><br><br>
		</div>
	</form>
		      
		      <script>
		      function MyValidation(){
             calculate();
              calculate1();
              calculate2();
                calculate3();
                }
</script>		      
		      
		     <script> calculate = function()
{
    var resources = document.getElementById('Cost').value;
    var minutes = document.getElementById('Quantity').value; 
    document.getElementById('Price').value = parseInt(resources)*parseInt(minutes);
     
   }</script>
   <script> calculate1 = function()
{
    var resources = document.getElementById('Cost').value;
    var minutes = document.getElementById('Quantity').value; 
    document.getElementById('AmountDue').value = parseInt(resources)*parseInt(minutes);
   }</script>
   <script> calculate2 = function()
{
    var resources = document.getElementById('AmountDue').value;
    var minutes = 1
    document.getElementById('AmountDue1').value = parseInt(resources)*parseInt(minutes);
     
   }</script>
    <script> calculate3 = function()
{
    var resources = document.getElementById('Cost').value;
    var minutes = document.getElementById('Quantity').value; 
    document.getElementById('SubTotal').value = parseInt(resources)*parseInt(minutes);
     
   }</script>
		  

		
		  
		





	</div>
	
</body>

</html>