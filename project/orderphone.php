<?php
session_start();
if ( empty($_SESSION["username"]) ) {  
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Order Phone</title>
</head>
<body>
    <h1 style="text-align:center; margin: 50px 0px">Order Phone</h1>
    <section style="margin:50px 0px">
        <div class="container">
            <?php
            if(isset($_GET['id']) && isset($_GET['name']) && isset($_GET['color'])){
                $phoneID = $_GET['id'];
                $phoneName = $_GET['name'];
                $phoneColor = $_GET['color'];
                ?>
                <form action="orderphone.php" method="post">
                    <div class="mb-3">
                        <label for="phoneName" class="form-label">Phone Name</label>
                        <input type="text" class="form-control" id="phoneName" name="phoneName" value="<?php echo $phoneName; ?>" readonly>
                    </div>
                    <div class="mb-3">


                    <label for="phoneColor" class="form-label">Phone Color</label>
                        <input type="text" class="form-control" id="phoneColor" name="phoneColor" value="<?php echo $phoneColor; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address(Including city,town,village...)</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="contactNumber" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactNumber" name="contactNumber" required>
                    </div>
                    <input type="hidden" name="phoneID" value="<?php echo $phoneID; ?>">
                    <input type="submit" class="btn btn-success" value="Submit">
                </form>
            <?php
            }
            ?>
            <br>
            <a href="phonesmain.php">
                <button class="btn btn-danger">Back to Phones List</button>
            </a>
        </div>
    </section>


    <?php
    require_once "conn.php"; // Include your database connection file


    if (isset($_POST['phoneName']) && isset($_POST['phoneColor']) && isset($_POST['address']) && isset($_POST['contactNumber']) && isset($_POST['phoneID'])) {
        $phoneID = $_POST['phoneID'];
        $phoneName = $_POST['phoneName'];
        $phoneColor = $_POST['phoneColor'];
        $address = $_POST['address'];
        $contact = $_POST['contactNumber'];
        

        // Insert the order into the database
        $sql_query = "INSERT INTO orders (phonename, phonecolor, address, contact) 
        VALUES ('$phoneName', '$phoneColor', '$address', '$contact')";

        if ($conn->query($sql_query) == TRUE) {
            header("Location:orderphonesuccess.php");
        } else {
            echo '<p>Error: ' . $conn->error . '</p>';
        }
    }


$conn->close(); // Close the database connection
?>
</body>
</html>
