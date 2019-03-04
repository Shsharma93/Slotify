<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");
$account = new Account($con);
include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

function rememberValue($input)
{
    if (isset($_POST[$input])) {
        echo $_POST[$input];
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to Slotify</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>

<body>
    <?php

    if (isset($_POST['register'])) {
        echo '<script>
            $(document).ready(function() {
                $("#loginForm").hide();
                $("#registerForm").show();
            });
        </script>';
    } else {
        echo '<script>
            $(document).ready(function() {
                $("#loginForm").show();
                $("#registerForm").hide();
            });
        </script>';
    }

    ?>

    <div id="background">
        <div id="loginController">
            <div id="inputContainer">
                <form action="register.php" id="loginForm" method="POST">
                    <h2>Log In to your Slotify account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username </label>
                        <input type="text" id="loginUsername" placeholder="eg: toddastle" name="loginUsername" value="<?php rememberValue('loginUsername') ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password </label>
                        <input type="password" id="loginPassword" placeholder="enter your password" name="loginPassword" required>
                    </p>

                    <button type="submit" id="loginButton" name="loginButton">LOG IN</button>


                    <div class="hasAccountText">
                        <span id="hideLogin">
                            Don't have an account yet? Sign Up here.
                        </span>
                    </div>
                </form>

                <form action="register.php" id="registerForm" method="POST">
                    <h2>Create Your Account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$usernameLength); ?>
                        <?php echo $account->getError(Constants::$usernameExists); ?>
                        <label for="username">Username </label>
                        <input type="text" id="username" placeholder="eg: todastle" value="<?php rememberValue('username') ?>" name="username" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameLength); ?>
                        <label for="firstName">First Name </label>
                        <input type="text" id="firstName" placeholder="eg: Todd" value="<?php rememberValue('firstName') ?>" name="firstName" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameLength); ?>
                        <label for="lastName">Last Name </label>
                        <input type="text" id="lastName" placeholder="eg: Astle" value="<?php rememberValue('lastName') ?>" name="lastName" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNoMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailExists); ?>
                        <label for="email">Email </label>
                        <input type="email" id="email" placeholder="eg: todd@abc.com" value="<?php rememberValue('email') ?>" name="email" required>
                    </p>
                    <p>
                        <label for="email2">Confirm Email </label>
                        <input type="email" id="email2" name="email2" placeholder="re-enter your email" value="<?php rememberValue('email2') ?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordDoNoMatch); ?>
                        <?php echo $account->getError(Constants::$passwordLength); ?>
                        <?php echo $account->getError(Constants::$passwordAlphanumeric); ?>
                        <label for="password">Password </label>
                        <input type="password" id="password" name="password" placeholder="Your password" required>
                    </p>
                    <p>
                        <label for="password2">Confirm Password </label>
                        <input type="password" id="password2" name="password2" placeholder="Your password" required>
                    </p>
                    <p>
                        <button type="submit" name="register">Sign Up</button>
                    </p>
                    <div class="hasAccountText">
                        <span id="hideRegister">
                            Already have an account? Log In here.
                        </span>
                    </div>
                </form>
            </div>

            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free.</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlists</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>

        </div>
    </div>
</body>

</ html> 