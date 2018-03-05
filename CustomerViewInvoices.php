

<?php
//including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/

include_once("config.php");
 
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

<?php
//including the database connection file
include_once("config.php");
session_start();

$login_session=$_SESSION['login_user'];
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM Invoices WHERE CustName = '".$_SESSION['login_user']."'"); // using mysqli_query instead
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
                   DevLink &trade;<br>Customer Panel
                </a><?php
                session_start();


$login_session=$_SESSION['login_user'];
$login_sessionid=$_SESSION['login_userid'];



echo $login_session ; 
echo "<br>";
echo $login_sessionid;
echo "<br>";


$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);


?>
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
                                <h4 class="title">Invoices</h4>
                                <p class="category">Here are your pending invoices!<br>Thank you for being a customer.</p>
                      



                   
                               
 
 
   <table class="table table-striped" width='50%' border=0>
        <tr bgcolor='white'>
            <strong><td>Invoice ID</td></strong>
           <strong> <td>Customer ID</td></strong>
            <strong><td>Customer Name</td></strong>
            
            
        </tr>
        <?php 
     //  while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
       while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['Customerid']."</td>";
            echo "<td>".$res['CustName']."</td>";  
            
            
             
            
       echo "<td><button type='button' class='btn btn-primary'><a href=\"CustomerSeeInvoice.php?id=$res[id]\">Pay Online</a></button></td>"; 
        
     //   echo "<td><input type=checkbox>Mark As Complete<br><a href=\"CompleteTask.php?id=$res[id]\" onClick=\"return confirm('Are you sure you?')\"></a></td>";
        
            }
        ?>
        
        
  
 
    </table>
    
    



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
