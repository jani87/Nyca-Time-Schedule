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

$instructorId = intval($_POST['Instructor']);
$studentId = intval($_POST['Student']);
$date1 = $_POST[Date];
$date = date("Y-m-d", strtotime($date1));


// $sql = "INSERT INTO `Enrollments` (`instructorId`, `studentId`,'startDate')
// VALUES ('$instructorId','$studentId','$date');";

$sql="insert into Enrollments(instructorId,studentId,startDate) values ($instructorId,$studentId,'$date');";

//$selectPid = "SELECT `personId` FROM `Persons` WHERE `firstName` = '$firstname'";

if (mysqli_query($conn, $sql)) {
   echo "New record created successfully";
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);
?>
