<?php
//including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/
include_once("config.php");



if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
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
       
        header("Location: ViewInvoices.php");
        
        //link to the previous page
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE Invoices SET Date='$Date',CustName='$CustName',Customerid='$Customerid',Items='$Items',Quantity='$Quantity',Price='$Price',SubTotal='$SubTotal',AmountPaid='$AmountPaid',AmountDue='$AmountDue' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: ViewInvoices.php");
    }
}
?>

<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Invoices WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
     $Date = $res['Date'];
    $CustName = $res['CustName'];
     $Customerid = $res['Customerid'];
    $Items = $res['Items'];
     $Quantity = $res['Quantity'];
     $SubTotal = $res['SubTotal'];
    $Price = $res['Price'];
    $AmountPaid = $res['AmountPaid'];
     $AmountDue =$res['AmountDue'];
}
//end
?>





<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                   DevLink &trade;<br>Developer Panel
                </a>
            </div>

           <ul class="nav">
                <li class="active">
                    <a href="CustomerPanel.php">
                        <i class="ti-panel"></i>
                        <p>Customer Panel</p>
                    </a>
                </li>
                <li>
                    <a href="CustomerViewMessageResponse.php">
                        <i class="ti-user"></i>
                        <p></p>Tickets</p>
                    </a>
                </li>
               
                <li>
                    <a href="CustomerViewInvoices.php">
                        <i class="ti-text"></i>
                        <p>Invoices</p>
                    </a>
                </li>
                
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" >Developer Panel</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification">5</p>
									<p>Notifications</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
						<li>
                            <a href="#">
								<i class="ti-settings"></i>
								<p>Settings</p>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Invoice View</h4>
                                <p class="category">Here is a breakdown of the services. When paying online ensure you enter the amount in the Amount Due textbox, otherwise your ivoice will be marked as partially payed.</p>
                               

 
    <br/><br/>
    
    <form name="form1" method="post" action="SeeInvoice.php">
        <table border="0">
            <tr> 
                <td>Date</td>
                <td><input type="text" name="Date" maxlength="20" value="<?php echo $Date;?>"></td>
            </tr>
            <tr> 
                <td>Customer Name </td>
                <td><input type="text" name="CustName" maxlength="10" value="<?php echo $CustName;?>"></td>
            </tr>
            <tr> 
                <td>Customer ID</td>
                <td><input type="text" name="Customerid" maxlength="3" value="<?php echo $Customerid;?>"></td>
            </tr>
             <tr> 
                <td>Items</td>
                <td><input type="text" name="Items" value="<?php echo $Items;?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="Quantity" maxlength="20" value="<?php echo $Quantity;?>"></td>
            </tr>
            <tr> 
                <td>SubTotal</td>
                <td><input type="text" name="SubTotal" maxlength="20" value="<?php echo $SubTotal;?>"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="Price" maxlength="20" value="<?php echo $Price;?>"></td>
            </tr>
            <tr> 
                <td>Amount Paid</td>
                <td><input type="text" name="AmountPaid" maxlength="20" value="<?php echo $AmountPaid;?>"></td>
            </tr>
            <tr> 
                <td>Amount Due</td>
                <td><input type="text" name="AmountDue" maxlength="20" value="<?php echo $AmountDue;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
            
            </tr>
        </table>
    </form>

<br><br>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="j.m.boyle@hotmail.com">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="Invoice for Development Services">
  <input type="hidden" name="amount" >
  <input type="hidden" name="currency_code" value="EUR">

  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>




                            </div>
                            
                        </div>
                    </div>


                    



                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
				<div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>


    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>


</html>
