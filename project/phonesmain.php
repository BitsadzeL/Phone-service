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
    <title>Phones</title>
    <style>
    img {
        width: 64px;
        height: 64px;
        background: transparent;
    }
    </style>
</head>
<body>
<h1 style="text-align:center; margin: 50px 0px">Phones list</h1>
    <section style="margin:50px 0px">
        <div class="container">
            <table class="table table-light">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Phone Model</th>
                    <th scope="col">Phone Color</th>
                    <th scope="col">Phone Price($)</th>
                    <th scope="col">Phone Photo</th>
                    <th scope="col">Order</th>
                </thead>
                <tbody>
                    <?php
                    require_once "conn.php";
                    $sql_query = "SELECT * FROM phones";
                    if($result = $conn->query($sql_query)){
                        while($row = $result->fetch_assoc()){
                            $Id = $row["id"];
                            $phoneName = $row["phonename"];
                            $phoneColor = $row["phonecolor"];
                            $phonePrice = $row["phoneprice"];
                            $phonePhoto = $row["phonephoto"]; // Assuming the field name is "phonephoto"
                        
                            ?>
                            <tr class="trow">
                                <td><?php echo $Id; ?></td>
                                <td><?php echo $phoneName; ?></td>
                                <td><?php echo $phoneColor; ?></td>
                                <td><?php echo $phonePrice; ?></td>
                                <td>
                                    <?php
                                    // Check if photo path exists
                                    if (!empty($phonePhoto) && file_exists($phonePhoto)) {
                                        echo '<img src="' . $phonePhoto . '" alt="Phone Photo" >';
                                    } else {
                                        echo 'No Photo Available';
                                    }
                                    ?>
                                </td>
                                <td><a href="orderphone.php?id=<?php echo $Id;?>&name=<?php echo $phoneName; ?>&color=<?php echo $phoneColor; ?>" class="btn btn-primary">Order</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <a href="panel.php">
                <button class="btn btn-danger">Back to Panel</button>
            </a>
        </div>
    </section>
</body>
</html>
