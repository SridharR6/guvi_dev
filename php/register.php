<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "guvi";
$connection = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_error()){
    echo "failed";
    exit();
}     

$mailid = $_POST['mailid'];
$pwd = $_POST['pwd'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$mobile = $_POST['mobile'];


$sql = "INSERT INTO users (email, password) VALUES ( ?, ?)";
$stmt = mysqli_prepare($connection, $sql);
mysqli_stmt_bind_param($stmt, "ss", $value1, $value2);
$value1 = $mailid;
$value2 = $pwd;
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($connection);

$connection1 = mysqli_connect($serverName, $userName, $password, $dbName);
if(mysqli_connect_error()){
    echo "failed";
    exit();
} 

$sql = "INSERT INTO users1 (fname,lname,dob,age,address,mobile) VALUES (?,?,?,?,?,?)";
$stmt = mysqli_prepare($connection1, $sql);
mysqli_stmt_bind_param($stmt, "sssiss", $v1, $v2, $v3, $v4, $v5, $v6 );
$v1 = $fname;
$v2 = $lname;
$v3 = $dob;
$v4 = $age;
$v5 = $address;
$v6 = $mobile;

mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($connection1)
?>