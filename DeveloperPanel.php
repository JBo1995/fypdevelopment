

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
                   DevLink &trade;<br>Developer Panel
                   <h6><?php 
session_start();

$login_session=$_SESSION['login_user'];
$login_sessionteam=$_SESSION['login_team'];

echo $login_session;
echo "<br>";
echo $login_sessionteam;?></h6>

<a href="DeveloperLogout.php"> Logout </a></h3>
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
                 <br>
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Customers</p>
                                            
                                        
                                            <?php
// with help and modified from http://php.net/manual/en/function.mysql-num-rows.php
                                        
$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);

$result = mysql_query("SELECT * FROM Customers WHERE Paid = '".$_SESSION['login_team']."'", $link);
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
                                        <div class="icon-big icon-success text-center">
                                            <i class="ti-check-box"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Tasks to do</p>
                                            <?php
// with help from http://php.net/manual/en/function.mysql-num-rows.php
                                        
$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);

$result = mysql_query("SELECT * FROM todo WHERE Team = '".$_SESSION['login_team']."'", $link);
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
                                            <i class="ti-email"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Messages</p>
                                                                                   <?php
// with help from http://php.net/manual/en/function.mysql-num-rows.php
                                        
$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);

$result = mysql_query("SELECT * FROM Incidents WHERE Team = '".$_SESSION['login_team']."'", $link);
$num_rows = mysql_num_rows($result);

echo "$num_rows \n";
//end
?>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr /><?php
                                    //Code adapted from https://www.w3schools.com/sql/sql_count_avg_sum.asp
                                    $query = "SELECT AVG(ResponseRating) FROM Incidents WHERE team = '".$_SESSION['login_team']."'";     
                            $result = mysql_query($query);

// Print out result
while($row = mysql_fetch_array($result)) {
echo "Your average response rating is " ;
echo $row['AVG(ResponseRating)'] ; 
echo " out of 5";
}
                                    ?>
                                    <div class="stats">
                                       
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
                                            <i class="ti-wallet"></i>
                                        </div>
                                    </div>
                                    <div class="col-xs-7">
                                        <div class="numbers">
                                            <p>Invoices</p>
                                            <?php
                                            // with help from http://php.net/manual/en/function.mysql-num-rows.php
                                        
$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);

$result = mysql_query("SELECT * FROM Invoices WHERE Team = '".$_SESSION['login_team']."'", $link);
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

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    
                    
                    
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Recently Completed Tasks</h4>
                                
                                
                  
                                <p class="category"></p>
                            </div>
                            <div class="content">
                                
                                </div>
                            <div class="content">
                                
                            <?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT Task, Customer FROM todocomplete WHERE Team = '".$_SESSION['login_team']."' ORDER BY id ASC LIMIT 10"); // using mysqli_query instead
?>
 
      
 
 <table class="table table-striped" width='100%' border=0>
        <tr bgcolor='white'>
            <strong><td>Task</td></strong>
           <strong> <td>Customer</td></strong>
           
        </tr>
        <?php 
     //  while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
       while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['Task']."</td>";
            echo "<td>".$res['Customer']."</td>";
           
           // echo "<td><button type='button' class='btn btn-primary'><a href=\"EditCustomers.php?id=$res[id]\">Edit</a></button> | <button type='button' class='btn btn-danger'><a href=\"DeleteCustomer.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this Customer?')\">Delete</a></button></td>";        
        }
        ?>
    </table>
     
     
                                
                                
                              
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ">
                            <div class="header">
                                <h4 class="title">Communication Tickest Pending</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content">
                            
                            
                            <?php
//including the database connection file
include_once("config.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM Incidents WHERE team = '".$_SESSION['login_team']."'"); // using mysqli_query instead
?>
 
      
 
 <table class="table table-striped" width='100%' border=0>
        <tr bgcolor='white'>
            <strong><td>Ticket ID</td></strong>
            <strong><td>Name</td></strong>
           <strong> <td>Subject</td></strong>
           
        </tr>
        <?php 
     //  while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
       while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['id']."</td>";
            echo "<td>".$res['CustomerName']."</td>";
            echo "<td>".$res['Subject']."</td>";
           
           // echo "<td><button type='button' class='btn btn-primary'><a href=\"EditCustomers.php?id=$res[id]\">Edit</a></button> | <button type='button' class='btn btn-danger'><a href=\"DeleteCustomer.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete this Customer?')\">Delete</a></button></td>";        
        }
        ?>
    </table>
    

       

                                <div id="chartActivity" class="ct-chart"></div>
                                
                                <div class="footer">
                                    
                                    <hr>
                                    <div class="stats">
                                        
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
                                DevLink<br>Developer Panel
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
