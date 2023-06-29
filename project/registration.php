<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Registration</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet'  href='./styles/registration.css'>
    <link rel="icon" href="/photos/register.png">    

</head>
<body>

<?php

    require('db.php');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);

        
        $checkQuery = "SELECT * FROM users WHERE username = '$username'";
        $checkResult = mysqli_query($conn, $checkQuery);
        if (mysqli_num_rows($checkResult) > 0) {
            echo "<div class='form'>
                    <p class='error-message'>Try another username! This username is already taken.</p>
                    <p class='link'>Click here to <a href='registration.php'>Register</a> again.</p>
                  </div>";
        } else {
            $query = "INSERT INTO users (username, password) 
                    VALUES ('$username', '" . md5($password) . "')";

            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "<div class='form'>
                        <h3>You are registered successfully.</h3><br/>
                        <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
            } else {
                echo "<div class='form'>
                        <h3>Registration failed. Please try again.</h3><br/>
                        <p class='link'>Click here to <a href='registration.php'>Register</a> again.</p>
                    </div>";
            }
        }
    } else {
        ?>

        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required/>
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'taken') {
                echo "<p class='error-message'>Try another username! This username is already taken.</p>";
            }
            ?>
            <input type="password" class="login-input" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Register" class="login-button">
            <p class="link">Already have an account?<a href="login.php"> Click to Login</a></p>
        </form>

    <?php
    }
?>

</body>
</html>
