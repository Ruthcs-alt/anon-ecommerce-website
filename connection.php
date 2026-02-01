<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

$con = mysqli_connect('localhost', 'root', '','db_amruthecom');

// get the post records
$txtName = $_POST['txtName'];
$txtEmail = $_POST['txtEmail'];
$txtPhonenumber = $_POST['txtPhonenumber'];
$txtAddress = $_POST['txtAddress'];

// database insert SQL code
$sql = "INSERT INTO `users` (`Id`, `fldName`, `fldEmail`, `fldPhonenumber`, `txtAddress`)
 VALUES ('0', '$txtName', '$txtEmail', '$txtPhonenumber', '$txtAddress')";

// insert in database
$rs = mysqli_query($con, $sql);

if($rs)
{
 echo "users Records Inserted";
}

?>
