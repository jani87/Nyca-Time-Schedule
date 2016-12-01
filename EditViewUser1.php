<?php
///**
// * Created by PhpStorm.
// * User: Saketha
// * Date: 11/18/2016
// * Time: 3:02 PM
// */





$servername = "localhost";
$username = "root";
$password = "";
$dbname = "NycaTime";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT personId, firstName, lastName FROM Persons";
$result = mysqli_query($conn, $sql);
$data = array();

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        //echo "id: " . $row["personId"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
       array_push($data, array('personId'=>$row["personId"], 'firstName'=>$row["firstName"],'lastName'=>$row["lastName"]));
    }

}
else
{
    echo "0 results";
}


echo json_encode($data);



mysqli_close($conn);


?>