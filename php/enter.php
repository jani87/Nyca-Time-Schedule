<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">
    <title>EnterTime Form</title>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.0/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="../static/css/style.css">

    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="../static/scripts/script.js"></script>


</head>

<body>
<!--Container class-->
<div class="container">
    <!--Heading field-->
    <h1 align=center class="heading">NYCA TIME</h1>

    <!--Back button field-->
    <div>
        <button class="back-button" name="back" onclick="document.location.href='../html-templates/instructor.html';">
            Back
        </button>
    </div>
    <!-- entertimeform container which includes form of our EntryForm page-->
    <div class="entertimeform-container">
        <form id="enterTime" class="signup-form" action="insert.php" method="POST">
            <!--Form title -->

            <h1 class="heading" name="title">Enter Time Form</h1>
            <div class="form-group" align="center">

                <!-- all the fields are displayed in rows and colums manner without border(using table)  -->
                <table cellspacing="25">

                    <tr>
                        <!-- select Instructor field dropdown-->

                        <td><select id="selectInstructor" name="instructorName">
                                <option value="">Select the instructor</option>

                                <?php

                                $databaseHost = "localhost";
                                $databaseUser = "root";
                                $databasePassword = "jaga123";
                                $databaseName = "NycaTime";
                                $con = mysql_connect($databaseHost, $databaseUser, $databasePassword)
                                or die ('Connection Error');
                                mysql_select_db($databaseName, $con) or die ('Database Error');

                                $dd_res = mysql_query("SELECT P.personId,firstName,lastName FROM NycaTime.Persons P 
                                inner join NycaTime.PersonsAcl PA on P.personId = PA.personId and PA.roleId=3");
                                while ($r = mysql_fetch_row($dd_res)) {
                                    echo "<option value='$r[1]&nbsp$r[2]'> $r[1]&nbsp$r[2] </option>";
                                }
                                ?>
                            </select></td>

                    </tr>
                    <tr>
                        <!-- select student field dropdown-->

                        <td><select id="selectStudent" name="studentName">
                                <option value="">Select the student</option>

                                <?php

                                $databaseHost = "localhost";
                                $databaseUser = "root";
                                $databasePassword = "jaga123";
                                $databaseName = "NycaTime";

                                $con = mysql_connect($databaseHost, $databaseUser, $databasePassword)
                                or die ('Connection Error');
                                mysql_select_db($databaseName, $con) or die ('Database Error');

                                $dd_res = mysql_query("SELECT 
    p.firstName,
    p.lastName 
FROM Persons AS p
INNER JOIN Enrollments AS e ON p.personId = e.studentId
WHERE instructorId='10' ");
                                while ($r = mysql_fetch_row($dd_res)) {
                                    echo "<option value='$r[0]&nbsp$r[1]'> $r[0]&nbsp$r[1] </option>";
                                }
                                ?>
                            </select></td>

                    </tr>
                    <!-- Date field-->
                    <tr>

                        <td><input type="text" id="selectDate" name="currentDate"></td>
                    </tr>
                    <!-- Total Time field-->
                    <tr>

                        <td>
                            <p1 style="color:yellow;" name="hours">hh:
                                <select id="selectHrs" name="selectHrs" class="form-text">
                                    <option></option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                    <option value="7">07</option>
                                    <option value="8">08</option>
                                    <option value="9">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                                <p1 style="color:yellow;" name="minutes" class="form-text">mm:</p1>
                                <select id="selectMins" name="selectMins">
                                    <option></option>
                                    <option value="00">00</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                </select>
                        </td>
                    </tr>
                </table>

                <div>
                    <tab>
                        <!-- Reset and Submit Button fields-->
                        <input type="reset" value="Reset" class="reset-button" style="float: left;"
                               onclick="this.form.reset();">
                        <button class="login-button" style="float: right;" name="btn">Submit</button>

                    </tab>
                </div>

            </div>

        </form>
    </div>
</div>

</body>
</html>