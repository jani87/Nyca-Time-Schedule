<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>nyca time</title>
    <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Nunito:400,300,700'>
    <link rel="stylesheet" href="style.css">


</head>

<body>
<div class="container">
    <h1 class="heading">NYCA TIME</h1>
    <div class="form-container">
        <form class="signup-form" action="signin.php" method="post">
            <h3 class="title">Sign in</h3>

            <div class="form-group" id="username">
                <label><b>Username</b></label>
                <input class="form-input" placeholder="Username" name="userName" required="true"></input>

            </div>
            <div class="form-group" id="password">
                <label><b>Password</b></label>
                <input type="password" class="form-input" name="passwd" placeholder="Password" required="true"></input>

            </div>

            <div class="form-group">
                <button name="logIn"class="login-button">Login</button>
                <input class="remember-checkbox"type="checkbox"></input>
                <p class="remember-p">Remember me</p>
            </div>
        </form>

    </div>
</div>

<script src='https://code.jquery.com/jquery-2.1.4.min.js'></script>


</body>
</html>
