<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "NycaTime";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$uid = $_POST['userName'];
$pwd = $_POST['passwd'];

$sql= "SELECT * FROM Persons WHERE userName= '$uid' AND passwd = '$pwd'";
$result = $conn->query($sql);

if(!$row = $result->fetch_assoc()){
    echo "your username or password incorrect";
}else
{
    echo "you are logged in ";
}

?>