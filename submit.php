<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "NycaTime";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$firstname = $_POST['firstName'];
$lastname = $_POST['lastName'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$username = $_POST['username'];
$password = $_POST['passwd'];

$sql = "INSERT INTO `Persons` (`firstName`, `lastName`, `email`, `phone`, `username`, `passwd`)
VALUES ('$firstname','$lastname','$email','$phone','$username','$password');";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
