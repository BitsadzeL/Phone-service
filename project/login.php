<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="./styles/login.css"/>
    <link rel="icon" href="/photos/login.png">
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);  
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
        $result = mysqli_query($conn, $query);
        $rows = mysqli_num_rows($result);      
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            if (isset($_POST['rememberMe'])) {
                setcookie('username', $_POST['username'], time() + (365 * 24 * 60 * 60 * 3));
                setcookie('password', $_POST['password'], time() + (365 * 24 * 60 * 60 * 3));
            } else {
                setcookie('username', '', time() - 3600);
                setcookie('password', '', time() - 3600);
            }
            // Redirect to panel page
            header("Location:panel.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
        $rememberUsername = isset($_COOKIE['username']) ? $_COOKIE['username'] : '';
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true" value="<?php echo $rememberUsername; ?>"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/> <br><br>
        <input class="form-check-input" type="checkbox" value="" id="rememberMe" name="rememberMe" <?= (isset($_COOKIE['username']) && isset($_COOKIE['password'])) ? "checked" : '' ?>>
        <label class="form-check-label" for="rememberMe">Remember Me</label>
        <p class="link">Don't have an account? <a href="registration.php">Register Now</a></p>
        <p class="link">Forgot password?<a href="resetpass.php"> Click to Reset</a></p>        
  </form>
<?php
    }
?>
</body>
</html>
