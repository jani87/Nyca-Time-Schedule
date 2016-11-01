<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Nyca Time</title>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


  
  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Nunito:400,300,700'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>
  <div class="container">
  <h1 align="center" style="color:white">NYCA TIME</h1>
  <div class="form-container">
    <form class="signup-form" action="submit.php" method="post">
      <h3 class="title">Create Profile</h3>

      <div class="form-group" id="first_name">
        <input class="form-input" placeholder="First Name" id="first_name"  name="first_name" required="true"></input>
       
      </div>

      <div class="form-group" id="last_name">
        <input class="form-input" placeholder="Last Name" id="last_name" required="true"></input>
       
      </div>

      <div class="form-group" id="email">
        <input class="form-input" placeholder="Email" id="email" type="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true"></input>
       
      </div>

      <div class="form-group" id="phone">
        <input class="form-input" placeholder="Phone Number" id="phone" pattern="^[0-9]{10}$" required="true"></input>
       
      </div>

      <div class="form-group" id="username">
        <input type="text" class="form-input"  placeholder="Username" required="true"></input>
        
      </div>

      <div class="form-group" id="password">
        <input type="password" class="form-input" placeholder="Password" required="true"></input>
        
      </div>

      <div class="form-group">
        <button class="login-button" name="submit">Create User</button>
       
      </div>
    </form>
  </div>
</div>
  

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>

      <script src="js/index.js"></script>

</body>
</html>
