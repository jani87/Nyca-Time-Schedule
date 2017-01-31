<?php
$host="localhost";
$username="root";
$password="root";
$databasename="NycaTime";

$connect=mysql_connect($host,$username,$password);
$db=mysql_select_db($databasename);

if(isset($_POST['edit_row']))
{
    $row=$_POST['row_id'];
    $first=$_POST['first_val'];
    $last=$_POST['last_val'];
    $email=$_POST['email_val'];
    $phone=$_POST['phone_val'];
    $user=$_POST['user_val'];
    $pass=$_POST['pass_val'];

    mysql_query("update Persons set firstName='$first',lastName='$last', email='$email' ,phone='$phone', userName='$user', passwd='$pass' where id='$row'");
    echo "success";
    exit();
}

if(isset($_POST['delete_row']))
{
    $row_no=$_POST['row_id'];
    mysql_query("delete from Persons where id='$row_no'");
    echo "success";
    exit();
}

if(isset($_POST['insert_row']))
{
    $first=$_POST['first_val'];
    $last=$_POST['last_val'];
    $email=$_POST['email_val'];
    $phone=$_POST['phone_val'];
    $user=$_POST['user_val'];
    $pass=$_POST['pass_val'];
    mysql_query("insert into Persons values('','$first','$last','$email','$phone','$user','$pass')");
    echo mysql_insert_id();
    exit();
}
?>