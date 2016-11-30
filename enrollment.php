<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>nyca time</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script> 
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Nunito:400,300,700'>

  <link rel="stylesheet" href="style.css">

  <script>
    $(document).ready(function(){
    
    
   $("#startDatePicker").datepicker();    
    $("button").click(function(){
        $("form").submit();
    });    
});
  </script>
  
</head>

<body>
  <div class="container-fluid">
  <h1  class="heading">NYCA TIME</h1>
  <div class="instructorEnrollment-container">
    <form class="signup-form" id="contactForm" action="enrollmentSubmit.php" method="post" name="registration">
      <h3 class="title">Instructor Enrollment</h3>



      <div class="form-group" >
        <label><b>Select Instructor</b></label>
          <select class="role form-input5" name = "Instructor">
            <option value="">Select Instructor</option>


<?php
			$databaseHost     = "localhost"; 
			$databaseUser     = "root";
			$databasePassword = "root";
			$databaseName     = "NycaTime";
		
		         $con=mysql_connect($databaseHost ,$databaseUser ,$databasePassword )or die ('Connection Error');
	                 mysql_select_db("NycaTime",$con) or die ('Database Error');
				  
			 $dd_res=mysql_query("SELECT P.personId,firstName,lastName FROM NycaTime.Persons P inner join NycaTime.PersonsAcl PA on P.personId = PA.personId and PA.roleId=3");
			while($r=mysql_fetch_row($dd_res))
						 { 
						       echo "<option value='$r[0]'> $r[1]&nbsp$r[2] </option>";
						 }
					     ?>


           </select>           
      </div>

      <div class="form-group">
        <label><b>Select Student</b></label>
          <select class="role form-input6" name = Student>
            <option selected>Select Student</option>
           <?php
                        $databaseHost     = "localhost";
                        $databaseUser     = "root";
                        $databasePassword = "root";
                        $databaseName     = "NycaTime";

                         $con=mysql_connect($databaseHost ,$databaseUser ,$databasePassword )or die ('Connection Error');
                         mysql_select_db("NycaTime",$con) or die ('Database Error');

                         $dd_res=mysql_query("SELECT P.personId,firstName,lastName FROM NycaTime.Persons P inner join NycaTime.PersonsAcl PA on P.personId = PA.personId and PA.roleId=4");
                        while($r=mysql_fetch_row($dd_res))
                                                 {
                                                       echo "<option value='$r[0]'> $r[1]&nbsp$r[2] </option>";
                                                 }
                                             ?>
           </select>           
      </div>

<div class="form-group">
 <label><b>Start Date</b></label>
<input type="text" id="startDatePicker" class="form-input7" name="Date">
       
   </div>


     
      <div class="form-group">
        <button class="login-button" name="login">Enroll</button>
      </div>
    </form>
  </div>
</div>

</body>
</html>
            
