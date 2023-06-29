<?php
session_start();
if (empty($_SESSION["username"])) {
    header("Location: login.php");
    exit;
}
?>

<?php
require_once "conn.php";
if (isset($_POST['submit'])) {

    $service = $_POST['service_type'];
    $date = $_POST['visit_date'];
    $time = $_POST['visit_time'];

    // Check if the date is in the past
    $currentDate = date("Y-m-d");
    if ($date < $currentDate) {
        echo "<script> alert('Cannot plan a visit in the past.'); </script>";
    } else {
        // Check if the same date and time already exist
        $checkSql = "SELECT * FROM visits WHERE date = '$date' AND time = '$time'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            // The same date and time already exist
            echo "<script> alert('This place is busy, try another time and date.'); </script>";
        } else {
            // Proceed with the insertion
            $insertSql = "INSERT INTO visits (service, date, time) VALUES ('$service', '$date', '$time')";
            if (mysqli_query($conn, $insertSql)) {
                // Insertion successful
                echo "<script> alert('Visit planned successfully'); </script>";
            } else {
                // Insertion failed
                echo "Error: " . mysqli_error($conn);
            }
        }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan a Visit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h3 style="text-align:center; margin: 50px 0px">Plan a Visit</h3>
    <section>
        <div class="container">
            <form action="" method="post">
                <div class="row">
                    <div class="form-group col-lg-4">
                        <label for="service_type">Choose Service Type:</label>
                        <select name="service_type" id="service_type" class="form-control" required>
                            <option value="Battery replacement">Battery replacement</option>
                            <option value="Screen replacement">Screen replacement</option>
                            <option value="Software service">Software service</option>
                            <option value="Apply screen protector">Apply screen protector</option>
                            <option value="Fix charging port">Fix charging port</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="visit_date">Choose Date:</label>
                        <input type="date" name="visit_date" id="visit_date" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-4">
                        <label for="visit_time">Choose Visit Time:</label>
                        <select name="visit_time" id="visit_time" class="form-control" required>
                            <option value="12:00">12:00</option>
                            <option value="12:30">12:30</option>
                            <option value="13:00">13:00</option>
                            <option value="13:30">13:30</option>
                            <option value="14:00">14:00</option>
                            <option value="14:30">14:30</option>
                            <option value="15:00">15:00</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <input type="submit" name="submit" id="submit" class="btn btn-success" value="Plan Visit">
                        <a href="panel.php" class="btn btn-danger">Back</a>
                    </div>


                </div>
            </form>
        </div>
    </section>

</body>

</html>
