
<?php
//including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/

include_once("config.php");
 
if(isset($_POST['Submit'])) {    
    $Task = $_POST['Task'];
    $Customer = $_POST['Customer'];
    $Team = $_POST['Team'];
     $FullName = $_POST['FullName'];
    
    
        
    // checking empty fields
    if(empty($Task) || empty($Customer) || empty($Team) || empty($FullName)) {                
        if(empty($Task)) {
            
            echo "<font color='red'>Task field is empty.</font><br/>";
        }
        
        if(empty($Customer)) {
            echo "<font color='red'>Customer field is empty.</font><br/>";
        }
       
        if(empty($Team)) {
            echo "<font color='red'>Team field is empty.</font><br/>";
        }
        if(empty($FullName)) {
            echo "<font color='red'>Full Name field is empty.</font><br/>";
        }
        
        
        
       
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO todo(Task,Customer,Team,FullName) VALUES('$Task','$Customer','$Team','$FullName')");
        
        
    }
}
//end
?>
<?php 
session_start();

$login_session=$_SESSION['login_user'];
$login_sessionteam=$_SESSION['login_team'];
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
                                
                                 <h4 class="title">Add Task</h4>
                                <p class="category">Enter the details below to add a new task</p>
                               
    <br/><br/>
  

                                            <?php
// with help and modified from http://php.net/manual/en/function.mysql-num-rows.php
                                        
$link = mysql_connect("127.0.0.1", "jboyle", "");
mysql_select_db("customersdb", $link);
?>

    <form action="TaskList.php" method="post" name="form1">
        
        <table class="table table-striped" width="100%" border="0">
            <tr> 
                <td>Task</td>
                <td><input type="text" name="Task" maxlength="20"></td>
            </tr>
            <tr> 
                <td>Customer</td>
               
                <td>
                <?php
// With help from http://jsfiddle.net/My7D5/ & https://www.sitepoint.com/community/t/populate-dropdown-menu-from-mysql-database/6481/7
$conn = new mysqli('127.0.0.1', 'jboyle', '', 'customersdb') 
or die ('Cannot connect to db');

    $result = $conn->query("select id, CustName from Customers Where Paid = '".$_SESSION['login_team']."' ");
    
    echo "<html>";
    echo "<body>";
    echo "<select class='btn btn-primary dropdown-toggle'  id='mydropbox' onchange='copyValue()'>";

    while ($row = $result->fetch_assoc()) {

                  unset($id, $CustName);
                  $id = $row['id'];
                  $name = $row['CustName']; 
                  echo '<option value="'.$id.'">'.$name.'</option>';
                  
}

    echo "</select>";
    echo "</body>";
    echo "</html>";
?><br><br><input name="Customer" type="text" id="test" readonly="readonly" ></td>


            </tr>
             
            <tr> 
                <td>Team</td>
                <td><input type="text" class="form-control" name="Team" maxlength="20" value="<?php echo $login_sessionteam; ?>" readonly="readonly"></td>
            </tr>
            <tr> 
                <td>Full Name</td>
                <td><input type="text" class="form-control" name="FullName" id="FullName" maxlength="20" value="test" readonly="readonly"></td>
            </tr>
                <tr> 
                <td>
                    
                </td>
                <td><input type="submit" class="btn btn-default" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
    
    

<script>function copyValue() {
    var dropboxvalue = document.getElementById('mydropbox').value;
    document.getElementById('test').value = dropboxvalue;
}</script>
<!-- End modified componenet --> 


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
