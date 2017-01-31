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
$username = $_POST['userName'];
$password = $_POST['passwd'];
$role = $_POST['roles'];
$sql = "INSERT INTO `Persons` (`firstName`, `lastName`, `email`, `phone`, `userName`, `passwd`)
VALUES ('$firstname','$lastname','$email','$phone','$username','$password');";
if (mysqli_query($conn, $sql))
    {
    echo "New record created successfully";
    } else
    {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


$sql2 = "SELECT MAX(`personId`) FROM `Persons`;";


$result= mysqli_query($conn,$sql2);

if ($result)
{
    $row = mysqli_fetch_row($result);
    $id = intval($row[0]);
}else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
}

$query1 = "INSERT INTO `PersonsAcl` (`personId`, `roleId`) VALUES ( '$id', '$role');";
if (mysqli_query($conn,$query1))
{
    echo"record inserted in roles table";
}else {
    echo "Error: " . $query1 . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);




?>