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
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>DevLink</title>

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
                   DevLink &trade;<br>Admin Panel
                </a>
                 <?php 
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
</h1>
<a href="CustomerLogout.php"> Logout </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.html">
                        <i class="ti-panel"></i>
                        <p>Admin Panel</p>
                    </a>
                </li>
                <li>
                    <a href="CustomerViewMessageResponse.php">
                        <i class="ti-user"></i>
                        <p>. Tickets</p>
                    </a>
                </li>
                <li>
                    <a href="table.html">
                        <i class="ti-view-list-alt"></i>
                        <p>Task List</p>
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
                    <a class="navbar-brand" href="#">Customer Panel</a>
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
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-server"></i>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col-xs-7">
                                        <div class="numbers" id="test">
                                           <?php // with help and modified from http://php.net/manual/en/function.mysql-num-rows.php
                                        
$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);



                $result = mysql_query("SELECT id FROM Customers WHERE CustName='".$_SESSION['login_user']."'") or die(mysql_error());
if(is_resource($result) and mysql_num_rows($result)>0){
    $row = mysql_fetch_array($result);
 //   echo $row["id"];
    }
     ?>       
                                            <p>Tasks</p>
                                            <?php


$result = mysql_query("SELECT * FROM todo WHERE Customer = '".$row["id"]."'", $link);
$num_rows = mysql_num_rows($result);

echo "$num_rows \n";
end
?>
 <?php


$result = mysql_query("SELECT * FROM todocomplete WHERE customer = '".$row["id"]."'", $link);
$num_rows1 = mysql_num_rows($result);


end
?>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Tasks developers are working on for you
                                        
                                    </div>
                                      <script type="text/javascript">
                                
                                var bool = "<?php echo $num_rows ?>"; 
                               
                                
                                var bool1 = "<?php echo $num_rows1 ?>"; 

                                var result = (bool1/bool * 100)
                                
                                document.write("Your Project is " + result + "% Complete")

                                    </script>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Costs</p>
                                            -
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-calendar"></i> Last day
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-danger text-center">
                                            <i class="ti-pulse"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Open Communication Tickets</p>
                                         
                
                
                                            <?php
// with help and modified from http://php.net/manual/en/function.mysql-num-rows.php
                                        
$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);

$result = mysql_query("SELECT * FROM Incidents WHERE CustomerName = '".$_SESSION['login_user']."'", $link);
$num_rows = mysql_num_rows($result);

echo "$num_rows \n";
//end
?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-timer"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-info text-center">
                                            <i class="ti-twitter-alt"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Followers</p>
                                            +45
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                        <i class="ti-reload"></i> Updated now
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM login Order by team"); // using mysqli_query instead
?>
 
                
                  <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Developer List</h4>
                                <p class="category">Here is a list of your current customers</p>
                               
 <a href="AddDevAdmin.php">Add New Lead Developer</a><br/><br/>
 
   <table class="table table-striped" width='100%' border=0>
        <tr bgcolor='white'>
            <strong><td>id</td></strong>
           <strong> <td>username</td></strong>
            <strong><td>password</td></strong>
            <strong><td>team</td></strong>
        </tr>
        <?php 
     //  while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
       while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['username']."</td>";
            echo "<td>".$res['password']."</td>";  
            echo "<td>".$res['team']."</td>";  
            echo "<td><button type='button' class='btn btn-danger'><a href=\"DeleteDev.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this Developer?')\">Delete</a></button></td>";        
        }
        ?>
    </table>
    
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Email Statistics</h4>
                                <p class="category">Last Campaign Performance</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-timer"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">2015 Sales</h4>
                                <p class="category">All products including Taxes</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>

                                <div class="footer">
                                    <div class="chart-legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-warning"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="ti-check"></i> Data information certified
                                    </div>
                                </div>
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
                                DevLink<br>Customer Panel
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               -
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                -
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