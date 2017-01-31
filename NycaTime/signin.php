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
    mysqli_close($conn);
}else
{
    session_start();
    echo "you are logged in ";
// $sql= "SELECT personId,roleName FROM Persons WHERE userName= '$uid' inner join Aclroles";
    $sql ="select P.personId,roleId from Persons P inner join PersonsAcl on P.personId = PersonsAcl.personId where userName='$uid' " ;
    $result = mysqli_query($conn,$sql);

    $row = mysqli_fetch_row($result);
//$rowId = intval($row[1]);
    $_SESSION["personId"] = intval($row[0]);
    $_SESSION["roleId"] = intval($row[1]);
    // echo ("personID".$_SESSION["personId"]);
    // echo ("personID".$_SESSION["roleName"]);
    //  mysqli_close($conn);

    if($_SESSION["roleId"] == 1) {
        header("Location: SuperAdmin.php");
    }
    elseif($_SESSION["roleId"] == 2){
        header("Location : Manager page under Construction");
    }
    elseif($_SESSION["roleId"] == 3){
        header("Location: Student page under construction ");
    }
    elseif($_SESSION["roleId"] == 4){
        header("Location: instructor page under construction ");
    }






}

?>