<?php
$host = "localhost";
$username = "root";
$password = "jaga123";
$dbname = "NycaTime";


$conn = mysql_connect($host, $username, $password, $dbname);
if (!$conn) {
    die("Unable to connect");
}
mysql_select_db($dbname) or die(mysql_error());

// $selected = mysql_select_db("NycaTime", $conn)
//   or die("Unable to connect");

if (isset($_POST["currentDate"]) && isset($_POST["selectHrs"]) && isset($_POST["selectMins"]) &&
    isset($_POST["studentName"])
) {
    $date = $_POST['currentDate'];
    $a = date("Y-m-d", strtotime($date));
    $b = $_POST["selectHrs"] . ':' . $_POST["selectMins"];
    $c = $_POST['studentName'];
    $d = explode("&nbsp", $c);
} else {
    echo "no value supplied";
}

//execute the SQL query and insert records

$query1 = mysql_query("select enrollmentId from Enrollments where instructorId='10' and studentId in (select personId
 from Persons where lastName ='$d[1]')");

$res1 = mysql_fetch_array($query1);

$query2 = "INSERT into Times(enrollmentId,sessionDate,hours,statusId) VALUES ('$res1[0]','$a','$b','1')";


if (mysql_query($query2, $conn)) {
    echo "Records added successfully";
} else {
    echo "ERROR: Could not able to execute $conn. " . mysql_error($conn);
}

// Close connection
mysql_close($conn);
?>