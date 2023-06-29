<?php
session_start();
if ( ($_SESSION["username"])!="admin" ) {  
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add phone to the database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">    
</head>
<body>
    <h3 style="text-align:center; margin: 50px 0px">Open new office</h3>
    <section>
        <div class="container">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="form-group col-lg-3">
                        <label for="city">City </label>
                        <input type="text" name="city" id="city" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="name">Address </label>
                        <input type="text" name="address" id="address" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-3">
                        <label for="hours">Working hours </label>
                        <input type="text" name="hours" id="hours" class="form-control" required>
                    </div>


                    <div class="form-group col-lg-3" style="display:grid; align-items:flex-end">
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="+ADD">
                    </div>

                </div>
            </form>
            <br>
            <a href="panel.php">
                <button class="btn btn-danger">Back to Panel</button>
            </a>
        </div>
    </section>

    <?php
        require_once "conn.php";
        if(isset($_POST['submit'])){
            $city = $_POST['city'];
            $address = $_POST['address'];
            $hours = $_POST['hours'];

            // Check if all fields are filled
    

                // Insert phone details into the database
                $sql = "INSERT INTO offices (`city`, `address`, `working_hours`) 
                        VALUES ( '$city', '$address','$hours')";

                if(mysqli_query($conn, $sql)){
                    header("location: openofficesuccess.php"); // Redirect to the panel page after successful insertion
                    exit();
                } else {
                    echo "SOMETHING WENT WRONG!";
                }

        }
    ?>
</body>
</html>
