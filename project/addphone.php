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
    <h3 style="text-align:center; margin: 50px 0px">Add new Phone</h3>
    <section>
        <div class="container">
            <form action="addphone.php" method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="form-group col-lg-2">
                        <label for="image">Phone image: </label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="name">Phone name: </label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="color">Phone color: </label>
                        <input type="text" name="color" id="color" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="price">Phone price($): </label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-2" style="display:grid; align-items:flex-end">
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
            $name = $_POST['name'];
            $color = $_POST['color'];
            $price = $_POST['price'];

            // Check if all fields are filled
            if($name != "" && $color != "" && $price != ""){
                $photoName = $_FILES['image']['name'];
                $photoTmpName = $_FILES['image']['tmp_name'];

                // Move uploaded photo to a desired location
                $uploadDirectory = 'photos/'; // Specify your desired directory
                $photoPath = $uploadDirectory . $photoName;
                move_uploaded_file($photoTmpName, $photoPath);

                // Insert phone details into the database
                $sql = "INSERT INTO phones (`phonephoto`, `phonename`, `phonecolor`,`phoneprice`) 
                        VALUES ('$photoPath', '$name', '$color','$price')";

                if(mysqli_query($conn, $sql)){
                    header("location: panel.php"); // Redirect to the panel page after successful insertion
                    exit();
                } else {
                    echo "SOMETHING WENT WRONG!";
                }
            } else {
                echo "Fields must not be empty!";
            }
        }
    ?>
</body>
</html>
