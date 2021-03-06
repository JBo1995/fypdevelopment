<?php
// including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/

include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
   $Message = $_POST['Message'];
    $CustomerID = $_POST['CustomerID'];
    $CustomerName = $_POST['CustomerName'];
    $Subject = $_POST['Subject'];
    $DeveloperResponse = $_POST['DeveloperResponse'];
    
    // checking empty fields
  if(empty($Message) || empty( $CustomerID) || empty($CustomerName) || empty($Subject) || empty($DeveloperResponse)) {                
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
        if(empty($DeveloperResponse)) {
            echo "<font color='red'>Contact field is empty.</font><br/>";
        }
        
        
         header("Location: AAADevViewMessages.php");
        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE Incidents SET Message='$Message',CustomerID='$CustomerID',CustomerName='$CustomerName',Subject='$Subject', DeveloperResponse='$DeveloperResponse' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: AAADevViewMessages.php");
    }
}
?>

<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Incidents WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $Message = $res['Message'];
    $CustomerID = $res['CustomerID'];
    $CustomerName = $res['CustomerName'];
    $Subject = $res['Subject'];
    $DeveloperResponse = $res['DeveloperResponse'];
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
                                <h4 class="title">Customer List</h4>
                                <p class="category">Here is a list of your current customers</p>
                               

 
    <br/><br/>
    
    <form name="form1" method="post" action="DevReplyMessage.php">
        <table border="0">
            <tr> 
                <td>Subject</td>
                <td><input class="form-control" type="text" readonly="readonly" name="Subject" value="<?php echo $Subject;?>"></td>
            </tr>
             <tr> 
                <td>Message</td>
                <td><input class="form-control" type="text" size="150%" readonly="readonly" name="Message" maxlength="20" value="<?php echo $Message;?>"></td>
            </tr>
            <tr> 
                <td></td>
                <td><input type="hidden" readonly="readonly" name="CustomerID" maxlength="10" value="<?php echo $CustomerID;?>"></td>
            </tr>
            <tr> 
                <td>Customer Name</td>
                <td><input class="form-control" type="text" readonly="readonly" name="CustomerName" value="<?php echo $CustomerName;?>"></td>
            </tr>
             <br><br> 
            <tr> 
        <br><br>
                <td>Your Response</td>
                <td><textarea class="form-control" type="text" size="100%" name="DeveloperResponse" placeholder="Your response here" value="<?php echo $DeveloperResponse;?>"></textarea></td>
            </tr>
            
           
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input class="btn btn-default" type="submit" name="update" value="Send"></td>
            </tr>
        </table>
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
