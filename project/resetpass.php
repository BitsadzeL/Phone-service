<!DOCTYPE html>
<html lang="en">
    <link rel="stylesheet" href="./styles/login.css">
<?php
require_once "conn.php";

if (isset($_POST["username"]) && isset($_POST["password"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the username exists in the database
    $checkQuery = "SELECT * FROM users WHERE username = '$username'";
    $checkResult = mysqli_query($conn, $checkQuery);
    
    if (mysqli_num_rows($checkResult) == 1) {
        $row = mysqli_fetch_assoc($checkResult);
        $oldPassword = $row['password'];
        if (md5($password) == $oldPassword) {
            echo "<div class='form'>
                  <h3>New password cannot be the same as the old password.</h3><br/>
                  <button onclick='window.location.href=\"resetpass.php\"' style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Reset Password</button>
                  </div>";
            exit();
        }
        
        
    
        // Update the password in the database
        $sql = "UPDATE users SET `password` = '" . md5($password) . "' WHERE username = '$username'";
    
        if (mysqli_query($conn, $sql)) {
            echo "<div class='form'>
                  <h3>Password was reseted successfully</h3><h4>Click to login with new data</h4>
                  <button onclick='window.location.href=\"login.php\"' style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>Log in</button>
                  </div>";
            
            exit();
        } else {
            echo "Something went wrong. Please try again later.";
        }
    } else {
        echo "<script>alert('Username does not exist. Register or enter valid username');</script>";
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
        crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style="text-align: center;margin: 50px 0;">Reset Password</h1>
        <div class="container">
            <section>
                <form action="resetpass.php" method="post">
                    <div class="row">
                        <div class="form-group col-lg-2">
                            <label for="username">Username: </label>
                            <input type="text" name="username" id="username" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="password">New Password: </label>
                            <input type="password" name="password" id="password" class="form-control" required>
                        </div>
                        <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </form>
            </section>
        
            <br>
            <a href="panel.php">
                    <button class="btn btn-danger">Back</button>
            </a>     
        </div>
    </section>
</body>
</html>
