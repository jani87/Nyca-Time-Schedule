<?php
/**
 * Created by PhpStorm.
 * User: Saketha
 * Date: 11/21/2016
 * Time: 1:59 PM
 */

$option = isset($_POST['changeStatus']) ? $_POST['changeStatus'] : false;
// echo $option;
//$option="6";

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "NycaTime";
$data = array();
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($option == 'All')
{

    $sql = "SELECT * FROM Persons,AclRoles WHERE 1";
    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        //echo "id: " . $row["personId"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
        array_push($data, array('personId'=>$row["personId"], 'firstName'=>$row["firstName"],'lastName'=>$row["lastName"],'userName'=>$row['userName'],'password'=>$row['passwd'],'role'=>$row['roleName'],'phone'=>$row['phone'],'email'=>$row['email']));

    }

    echo json_encode($data);
}
else {
    $sql = "SELECT * FROM Persons,AclRoles WHERE personId = '$option'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result))
    {
        //echo "id: " . $row["personId"]. " - Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
        array_push($data, array('personId'=>$row["personId"], 'firstName'=>$row["firstName"],'lastName'=>$row["lastName"],'userName'=>$row['userName'],'password'=>$row['passwd'],'role'=>$row['roleName'],'phone'=>$row['phone'],'email'=>$row['email']));

    }
    echo json_encode($data);
}
mysqli_close($conn);
?>