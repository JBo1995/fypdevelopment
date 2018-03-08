<?php
//including the database connection file
// With Help and modified from http://blog.chapagain.com.np/very-simple-add-edit-delete-view-in-php-mysql/


include_once("config.php");
 
if(isset($_POST['Submit'])) {  
  //$team = $_POST['team'];
    $Message = $_POST['Message'];
    $CustomerID = $_POST['CustomerID'];
    $CustomerName = $_POST['CustomerName'];
    $Subject = $_POST['Subject'];
     $team = $_POST['team'];
    
    
   
        
    // checking empty fields
    if(empty($Message) || empty( $CustomerID) || empty($CustomerName) || empty($Subject) || empty($team)) {                
       
        if(empty($Message)) {
            echo "<font color='red'>Message field is empty.</font><br/>";
        }
        if(empty($CustomerID)) {
            echo "<font color='red'>ID field is empty.</font><br/>";
        }
        if(empty($CustomerName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if(empty($Subject)) {
            echo "<font color='red'>Subject field is empty.</font><br/>";
        }
         if(empty($team)) {
            echo "<font color='red'>Team field is empty.</font><br/>";
        }
        //link to the previous page
        
    } else { 
        
        // if all the fields are filled (not empty)             
        //insert data to database
        $result = mysqli_query($mysqli, "INSERT INTO Incidents(Message,CustomerID,CustomerName,Subject,team) VALUES('$Message','$CustomerID','$CustomerName','$Subject','$team')");
        echo "<script type='text/javascript'>alert('Your Support Ticket has been sent. Thank you!')</script>";
        
    }
}

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
                   DevLink &trade;<br>Customer Panel
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
<?php
                $result = mysql_query("SELECT id FROM Customers WHERE CustName='".$_SESSION['login_user']."'") or die(mysql_error());
if(is_resource($result) and mysql_num_rows($result)>0){
    $row = mysql_fetch_array($result);
    echo $row["id"];
    }
    ?>
</h1>
<a href="CustomerLogout.php"> Logout </a>
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
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="content">
                                <div class="row">
                                    <div class="col-xs-5">
                                        <div class="icon-big icon-warning text-center">
                                            <i class="ti-check-box"></i>
                                            
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


$result = mysql_query("SELECT * FROM todo WHERE Customer = '".$_SESSION['login_user']."'", $link);
$num_rows = mysql_num_rows($result);

echo "$num_rows \n";
//end
?>
 <?php


$result = mysql_query("SELECT * FROM todocomplete WHERE customer = '".$_SESSION['login_user']."'", $link);
$num_rows1 = mysql_num_rows($result);


//end
?>

                                        </div>
                                    </div>
                                </div>
                                <div class="footer">
                                    <hr />
                                    <div class="stats">
                                       <p>Tasks developers are working on</p>
                                        
                                    </div>
                                      
                                </div>
                                <script type="text/javascript">
                                
                       
                                
                                var bool = "<?php echo $num_rows ?>"; 
                                var bool1 = "<?php echo $num_rows1 ?>"; 

                                var result = parseInt(bool) + parseInt(bool1);
                                
                               var dev = (parseInt(bool1)/parseInt(result)) * 100
                               if (isNaN(dev)) dev = 0;
                               
                        //       if(parseInt(bool1) > 0 && (parseInt(bool) == 0)) {
                        //       var dev = 100;
                        //       }
                               
                               if(parseInt(bool1)==0){
                                 var dev = 0;
                               }
                                
                               
                                 document.write("<p>Your Project is " + dev + "% Complete</p>")
                           
                                
                                

                                    </script>
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
                                            <p>Invoices Outstanding</p>
                                            
                                            <?php

     
$result = mysql_query("SELECT * FROM Invoices WHERE CustName ='".$_SESSION['login_user']."'", $link);
$num_rows = mysql_num_rows($result);

echo "$num_rows \n";

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
                                            <p>Open Comm Tickets</p>
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
                                            
                                        </div>
                                    </div>
                                   <style>.clock {
  font-size: 3em;
}</style>
                                    <div class="clock">
                                        
                                        <p>Time</p><script>
                      function clock() {// We create a new Date object and assign it to a variable called "time".
var time = new Date(),
    
    // Access the "getHours" method on the Date object with the dot accessor.
    hours = time.getHours(),
    
    // Access the "getMinutes" method with the dot accessor.
    minutes = time.getMinutes(),
    
    
    seconds = time.getSeconds();

document.querySelectorAll('.clock')[0].innerHTML = harold(hours) + ":" + harold(minutes) + ":" + harold(seconds);
  
  function harold(standIn) {
    if (standIn < 10) {
      standIn = '0' + standIn
    }
    return standIn;
  }
}
setInterval(clock, 1000);</script>
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

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                               
<h4 class="title">Send Communication Ticket</h4>
<p class="category">Enter the details below to send a support ticket</p>
                               
    <br/><br/>
 
    <form action="CustomerPanel.php" method="post" name="form1" class="form-group">
        <table class="table" width="100%" border="0">
            <tr> 
                <td>Customer ID</td>
                <td><input type="text" class="form-control" value="<?php
                $result = mysql_query("SELECT id FROM Customers WHERE CustName='".$_SESSION['login_user']."'") or die(mysql_error());
                if(is_resource($result) and mysql_num_rows($result)>0){
                  $row = mysql_fetch_array($result);
                 echo $row["id"];
                   }
                ?>"   name="CustomerID" id="CustomerID" maxlength="20" readonly="readonly">              
             
            </td>
            </tr>
            <tr> 
                <td>Name</td>
                <td><input class="form-control" value="<?php 
                $login_session=$_SESSION['login_user'];
                echo $login_session;?>" type="text" name="CustomerName" maxlength="10" readonly="readonly"></td>
            </tr>
            <tr> 
                <td>Subject</td>
                <td><input type="text" class="form-control" name="Subject" maxlength="20"></td>
            </tr>
            <tr> 
                <td>Message</td>
                <td><textarea type="text" class="form-control" name="Message"  maxlength="300"></textarea></td>
            </tr>
            <tr> 
                <td>Team</td>
                <td><input class="form-control" type="text" value="<?php
                $result = mysql_query("SELECT Paid FROM Customers WHERE CustName='".$_SESSION['login_user']."'") or die(mysql_error());
                if(is_resource($result) and mysql_num_rows($result)>0){
                  $row = mysql_fetch_array($result);
                 echo $row["Paid"];
                   }
                ?>"   name="team" id="team" maxlength="20" readonly="readonly">              
             
            </td>
            <tr> 
                <td>
                </td>
                <td><input type="hidden" name="DeveloperResponse"  maxlength="100" readonly="readonly" placeholder="A developer will respond here..."></td>
            </tr>
            <td></td>
                <td><input class="btn btn-default" type="submit" name="Submit" value="Submit"></td>
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
