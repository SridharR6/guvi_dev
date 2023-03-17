<?php

// require ('../assets/vendor/autoload.php');
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
$find = "SELECT * FROM users WHERE email = '$mailid'";
$result = mysqli_query($connection, $find);
if (mysqli_num_rows($result) >= 1){
    echo "email already exists";
    exit();
}else{  
    $sql = "INSERT INTO users (email, password) VALUES ( ?, ?)";
    $stmt = mysqli_prepare($connection, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $value1, $value2);
    $value1 = $mailid;
    $value2 = $pwd;
     
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($connection);
    echo "signed Up";
}



// $connection = mysqli_connect($serverName, $userName, $password, $dbName);
// $find = "SELECT * FROM users WHERE email = '$mailid' and password = '$pwd'";
// $res = mysqli_query($connection, $find);
// $r1 = mysqli_fetch_assoc($res);
// $userid = $r1['id'];

// $client = new MongoClient('mongodb://127.0.1.1');
// $database = $client->guvi;
// $collection = $database->users;
// $document = array(
//     'userid'=>$userid,
//     'fname'=>$fname,
//     'lname'=>$lname,
//     'dob' => $dob,
//     'age' => $age,
//     'address' => $address,
//     'mobile'=>$mobile
// );
// $collection->insert($document);


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