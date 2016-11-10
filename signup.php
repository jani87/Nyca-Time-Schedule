<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>nyca time</title>
  <!-- <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script> -->
  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Nunito:400,300,700'>

  <link rel="stylesheet" href="style.css">
  
</head>

<body>
  <div class="container-fluid">
  <h1  class="heading">NYCA TIME</h1>
  <div class="form-container">
    <form class="signup-form" id="contactForm" action="submit.php" method="post" name="registration">
      <h3 class="title">Create Profile</h3>

      <div class="form-group" id="first_name">
        <label><b>First Name</b></label>
        <input class="form-input" placeholder="First Name"  name="firstName" required="true"></input>
       
      </div>

      <div class="form-group" id="last_name">
        <label><b>Last Name</b></label>
        <input class="form-input" placeholder="Last Name" name="lastName" required="true"></input>
       
      </div>

      <div class="form-group" id="email">
        <label><b>Email</b></label>
        <input class="form-input" placeholder="Email" name="email" type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" id="emailright" required="true"></input>
       
      </div>

      <div class="form-group" id="phone">
        <label><b>Phone</b></label>
        <input type="tel" class="form-input" name="phone" placeholder="Phone Number" id="phoneright" pattern="[0-9]{10}$" required="true"></input>
       
      </div>

      <div class="form-group" id="username">
        <label><b>Username</b></label>
        <input type="text" class="form-input" name="username" placeholder="Username" id="usernameright" required="true"></input>
        
      </div>

      <div class="form-group" id="password">
        <label><b>Password</b></label>
        <input type="password" id="passwordright" class="form-input" name="passwd" placeholder="Password" required="true"></input>
       
      </div>


      <div class="form-group">
        <label><b>Role</b></label>
          <select class="role form-input5">
            <option selected>Default</option>
            <option value="3">Student</option>
            <option>Instructor</option>
            <option>Manager</option>
           </select>           
      </div>
     
      <div class="form-group">
        <button class="login-button" name="submit">Create User</button>
      </div>
    </form>
  </div>
</div>

<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</body>
</html>
