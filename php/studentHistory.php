<?php

$data = array();

$conn = mysqli_connect('localhost','root','','nycatime');
if(!$conn)
{
	die("Check the database connection".mysqli_connect_error());
}
else
{
	$query = "select firstName,lastName,sessionDate,hours,statusName from persons,times,enrollments,statustypes
              where persons.personId = enrollments.instructorId
              and instructorId in ( select instructorId from enrollments
                                    where studentId = 3 and enrollmentId in ( select enrollmentId from times
                                                                              where times.enrollmentId = enrollments.enrollmentId
                                                                              and statusName in (select statusName from statustypes
                                                                                                  where times.statusId = statustypes.statusId)))";



    $result=mysqli_query($conn,$query);
    while($row = mysqli_fetch_assoc($result))
    {
    	array_push($data, array('InstructorfirstName'=>$row["firstName"],'InstructorlastName'=>$row["lastName"],'Date'=>$row["sessionDate"],'Hours'=>$row["hours"],'Status'=>$row["statusName"]));
    }

    echo json_encode($data);

}


mysqli_close($conn);

?>