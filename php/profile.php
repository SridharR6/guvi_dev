<?php

require("../assets/vendor/autoload.php");
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "guvi";

$connection = mysqli_connect($serverName, $userName, $password, $dbName);

if(mysqli_connect_error()){
    echo "failed";
    exit();
}

$id = $_POST['id'];
try{
    $redis = new Predis\Client();
    $useragent = $redis->get("useragent");
    $loggedinat = $redis->get("loggedinat");
}
catch(Exception $e){
    echo $e->getMessage();
}
$sql = "SELECT * FROM users1 WHERE id = '$id'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['fname']." ".$row['lname'];
echo "Name: ".$name."<br>"."Age: ".$row['age']."<br>"."Address: ".$row['address']."<br>"."Phone: ".$row['mobile']."<br>"."<h3>Session Related Data</h3><br>UserAgent: ".$useragent."<br>"."Logged In At: ".$loggedinat."<br>";
mysqli_close($connection);

?>
