<?php
// including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/

include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
  
   
     $ResponseRating = $_POST['ResponseRating'];
    
    // checking empty fields
  if(empty($ResponseRating)) {                
        
        
         if(empty($ResponseRating)) {
            echo "<font color='red'>Contact field is empty.</font><br/>";
        }
        
        
         header("Location: CustomerViewMessageResponse.php");
        
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE Incidents SET ResponseRating='$ResponseRating' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:  CustomerViewMessageResponse.php");
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
    
    $ResponseRating = $_POST['ResponseRating'];
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
                    <a class="navbar-brand" href="#">Customer Panel</a>
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
                                
                                <li><a href="ChangePassword.php">Change Password</a></li>
                                <li><a href="CustomerViewMessageResponse.php">View Communication Tickets</a></li>
                               
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
                                <h4 class="title">Rate the Response</h4>
                                <p class="category">Out of <strong>5</strong> with <strong> 1</strong> being poor and 5 being good, how to you rate the response?</p>
                               

 
    <br/><br/>
    
    <form name="form1" method="post" action="CustomerRateResponse.php">
        <table border="0">
           
            
             <tr> 
                <td>Rate The Response &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><br>
                <td ><select class="btn btn-secondary dropdown-toggle"  name="ResponseRating">
    <option value="1" class="dropdown-item">1</option>
    <option value="2" class="dropdown-item">2</option>
    <option value="3" class="dropdown-item">3</option>
    <option value="4" class="dropdown-item">4</option>
    <option value="5" class="dropdown-item">5</option>
  </select></td>
                
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><br><input type="submit" class="btn btn-default" name="update" value="Update"></td>
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
