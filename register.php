<?php
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Slotify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>

<body>
    <h1>Register page</h1>
    <div id="inputContainer">
        <form action="register.php" id="loginForm" method="POST">
            <h2>Login Form</h2>
            <p>
                <label for="loginUsername">Username : </label>
                <input type="text" id="loginUsername" placeholder="eg: toddastle" name="loginUsername" required>
            </p>
            <p>
                <label for="loginPassword">Password : </label>
                <input type="password" id="loginPassword" placeholder="enter your password" name="loginPassword" required>
            </p>
            <p>
                <button type="submit" name="loginButton">Log In</button>
            </p>
        </form>

        <form action="register.php" id="loginForm" method="POST">
            <h2>Create Your Account</h2>
            <p>
                <label for="username">Username : </label>
                <input type="text" id="username" placeholder="eg: todastle" name="username" required>
            </p>
            <p>
                <label for="firstName">First Name : </label>
                <input type="text" id="firstName" placeholder="eg: Todd" name="firstName" required>
            </p>
            <p>
                <label for="lastName">Last Name : </label>
                <input type="text" id="lastName" placeholder="eg: Astle" name="lastName" required>
            </p>
            <p>
                <label for="email">Email : </label>
                <input type="email" id="email" placeholder="eg: todd@abc.com" name="email" required>
            </p>
            <p>
                <label for="email2">Confirm Email : </label>
                <input type="email" id="email2" name="email2" placeholder="re-enter your email" required>
            </p>
            <p>
                <label for="password">Password : </label>
                <input type="password" id="password" name="password" placeholder="Your password" required>
            </p>
            <p>
                <label for="password2">Confirm Password : </label>
                <input type="password" id="password2" name="password2" placeholder="Your password" required>
            </p>
            <p>
                <button type="submit" name="register">Sign Up</button>
            </p>
        </form>
    </div>
</body>

</html> 