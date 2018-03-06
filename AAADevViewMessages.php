
<?php
//including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/

include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $Message = $_POST['Message'];
    $CustomerID = $_POST['CustomerID'];
    $CustomerName = $_POST['CustomerName'];
    $Subject = $_POST['Subject'];
    $DeveloperResponse = $_POST['DeveloperResponse'];
   
        
    // checking empty fields
    if(empty($Message) || empty( $CustomerID) || empty($CustomerName) || empty($Subject)) {                
        if(empty($Message)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($CustomerID)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($CustomerName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($Subject)) {
            echo "<font color='red'>Contact field is empty.</font><br/>";
        }
        
        
        //link to the previous page
        
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO Incidents(Message,CustomerID,CustomerName,Subject) VALUES('$Message','$CustomerID','$CustomerName','$Subject')");
        echo "<script type='text/javascript'>alert('Your Support Ticket has been sent. Thank you!')</script>";
        
    }
}
//end
?>
<?php 
session_start();

$login_session=$_SESSION['login_user'];
$login_sessionteam=$_SESSION['login_team'];

?>
<?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM Incidents WHERE team = '".$_SESSION['login_team']."'"); // using mysqli_query instead
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
                    <a href="DeveloperPanel.php">
                        <i class="ti-panel"></i>
                        <p>Developer Panel</p>
                    </a>
                </li>
                <li>
                    <a href="CustomerList.php">
                        <i class="ti-user"></i>
                        <p>Customer Control</p>
                    </a>
                </li>
                <li>
                    <a href="TaskList.php">
                        <i class="ti-check-box"></i>
                        <p>Task List</p>
                    </a>
                </li>
                <li>
                    <a href="ViewInvoices.php">
                        <i class="ti-money"></i>
                        <p>Invoices</p>
                    </a>
                </li>
                <li>
                    <a href="AAADevViewMessages.php">
                        <i class="ti-email"></i>
                        <p>View Messages</p>
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
                    <a class="navbar-brand" >Developer Panel<br><br><br></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                       
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   
                                    <p class="notification"></p>
									<p>Settings</p>
									<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="AddDeveloper.php">Add New Team Member</a></li>
                                <li><a href="ViewDevelopers.php">Change Password</a></li>
                               
                               
                              </ul>
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
                                <h4 class="title">Pending Messages</h4>
                                <p class="category">Here is a list of your current messages you must reply to</p>
                               
 
 
   <table class="table table-striped" width='100%' border=0>
        <tr bgcolor='white'>
            <strong><td>Message</td></strong>
           <strong> <td>Customer ID</td></strong>
            <strong><td>Customer Name</td></strong>
            <strong><td>Subject</td></strong>
            <strong><td>Response</td></strong>
             <strong><td>Rating</td></strong>
        </tr>
        <?php 
     //  while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
       while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['Message']."</td>";
            echo "<td>".$res['CustomerID']."</td>";
            echo "<td>".$res['CustomerName']."</td>";  
            echo "<td>".$res['Subject']."</td>";
             echo "<td>".$res['DeveloperResponse']."</td>";
             echo "<td>".$res['ResponseRating']."</td>";
            echo "<td><button type='button' class='btn btn-primary'><a href=\"DevReplyMessage.php?id=$res[id]\">Reply</a></button> | <button type='button' class='btn btn-danger'><a href=\"DeleteMessage.php?id=$res[id]\">Delete</a></button> | <button type='button' class='btn btn-primary'><a href=\"CloseTicket.php?id=$res[id]\">Close Ticket</a></button> </td>";        
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
