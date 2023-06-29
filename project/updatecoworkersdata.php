<?php
session_start();
if ( empty($_SESSION["username"]) ) {  
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
require_once "conn.php";

if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["persid"]) && isset($_POST["position"])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $persid = $_POST['persid'];
    $position = $_POST['position'];
    $id = $_GET["id"];
    
    $sql = "UPDATE coworkers SET `name`= '$name', `surname`= '$surname', `pers_id`= '$persid', `position`= '$position' WHERE id = '$id'";
    
    if (mysqli_query($conn, $sql)) {
        header("location: coworkersmain.php");
        exit();
    } else {
        echo "Something went wrong. Please try again later.";
    }
}

// Fetch the coworker data to pre-fill the form
$id = $_GET["id"];
$sql_query = "SELECT * FROM coworkers WHERE id = '$id'";
$result = $conn->query($sql_query);
$row = $result->fetch_assoc();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD</title>
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
        <h1 style="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class="container">
            <section>
                
                    <form action="updatecoworkersdata.php?id=<?php echo $_GET['id']; ?>" method="post">
                        <div class="row">
                            <div class="form-group col-lg-2">
                                <label for="name">Co-worker name: </label>
                                <input type="text" name="name" id="name" class="form-control" value="<?php echo $row['name']; ?>" required>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="surname">Co-worker surname: </label>
                                <input type="text" name="surname" id="surname" class="form-control" value="<?php echo $row['surname']; ?>" required>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="persid">Co-worker personal ID: </label>
                                <input type="text" name="persid" id="persid" class="form-control" value="<?php echo $row['pers_id']; ?>" required>
                            </div>
                            <div class="form-group col-lg-2">
                                <label for="position">Co-worker position: </label>
                                <input type="text" name="position" id="position" class="form-control" value="<?php echo $row['position']; ?>" required>
                            </div>
                            <div class="form-group col-lg-2" style="display: grid;align-items:  flex-end;">
                                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update">
                            </div>
                        </div>
                    </form>
                
            </section>
        </div>
    </section>
</body>
</html>
