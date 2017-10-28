<?php
// including the database connection file
include_once("config.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    
   $CustName=$_POST['CustName'];
    $CustContact=$_POST['CustContact'];
    $TaskNum=$_POST['TaskNum']; 
    $Paid=$_POST['Paid']; 
    
    // checking empty fields
    if(empty($CustName) || empty($CustContact) || empty($TaskNum) || empty($Paid)) {            
        if(empty($CustName)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($CustContact)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($TaskNum)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }    
        
         if(empty($Paid)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }    
    } else {    
        //updating the table
        $result = mysqli_query($mysqli, "UPDATE Customers SET CustName='$CustName',CustContact='$CustContact',TaskNum='$TaskNum',Paid='$Paid' WHERE id=$id");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: index.php");
    }
}
?>




<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Customers WHERE id=$id");
 
while($res = mysqli_fetch_array($result))
{
    $CustName = $res['CustName'];
    $CustContact = $res['CustContact'];
    $TaskNum = $res['TaskNum'];
    $Paid = $res['Paid'];
}
?>



<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="index.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="CustName" value="<?php echo $CustName;?>"></td>
            </tr>
            <tr> 
                <td>Contact</td>
                <td><input type="text" name="CustContact" value="<?php echo $CustContact;?>"></td>
            </tr>
            <tr> 
                <td>Tasks</td>
                <td><input type="text" name="TaskNum" value="<?php echo $TaskNum;?>"></td>
            </tr>
             <tr> 
                <td>Paid</td>
                <td><input type="text" name="Paid" value="<?php echo $Paid;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>