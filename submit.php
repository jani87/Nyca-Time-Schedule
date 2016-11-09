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

$sql = "INSERT INTO Persons (firstName, lastName, email, phone, username, passwd)
VALUES ("'.$_POST[firstName]'","'.$_POST[LastName]'","'.$_POST[email]'","'.$_POST[phone]'","'.$_POST[username]'","'.$_POST[password]'")";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>