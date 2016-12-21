<html>
<head>
    <title>retrieving students list data</title>
    <style type="text/css">

        #data {
            color: yellow;
        }

        #data thead.tablehead {
            color: red;
        }

    </style>
</head>
<body style="background-color:rgba(6, 41, 61, 1)">

<!--Back button field-->
<div>
    <button class="back-button" name="logout" onclick="document.location.href='';">Logout</button>
</div>

<?php
/**
 * Created by JAGA
 * Date: 12/16/2016
 * Time: 3:33 PM
 */
$host = "localhost";
$username = "root";
$password = "jaga123";
$dbname = "NycaTime";


$conn = mysql_connect($host, $username, $password);
if (!$conn) {
    die("Unable to connect");
}
mysql_select_db($dbname) or die(mysql_error());


//execute the SQL query and return records
$result = mysql_query("SELECT 
    p.firstName,
    p.lastName,
    t.sessionDate,
    t.hours 
FROM Persons AS p
INNER JOIN Enrollments AS e ON p.personId = e.studentId
INNER JOIN Times AS t ON e.enrollmentId = t.enrollmentId
WHERE instructorId='10' ");
?>
<table border="5" bordercolor="white" align="center" margin:2 auto; id='data'
" >
<thead class='tablehead'>
<tr>
    <th>FirstName</th>
    <th>LastName</th>
    <th>sessionDate</th>
    <th>hours</th>
</tr>
</thead>
<tbody>
<?php
while ($row = mysql_fetch_assoc($result)) {
    echo
    "<tr>
              <td>{$row['firstName']}</td>
              <td>{$row['lastName']}</td>
              <td>{$row['sessionDate']}</td>
              <td>{$row['hours']}</td>
              </tr>";
}
?>
</tbody>
</table>
<?php mysql_close($connector); ?>
</body>
</html>