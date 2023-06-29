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
    <title>CO-workers</title>
    <style>
        .trow:hover{
            color:red;
        }
    </style>
</head>
<body>

<h1 style="text-align:center; margin: 50ox 0ox">Planned visits</h1>
    <section style="margin:50px 0px">
        <div class="container">
            <table class="table table-light">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Service</th>
                    <th scope="col">Date</th>
                    <th scope="col"> Time</th>
                    <th scope="col"></th>
                </thead>

                <tbody>
                    <?php
                    require_once "conn.php";
                    $sql_query = "SELECT * FROM visits";
                    if($result=$conn->query($sql_query)){
                        while($row=$result->fetch_assoc()){
                            $Id=$row["id"];
                            $Service=$row["service"];
                            $Date=$row["date"];
                            $Time=$row["time"];
                            ?>
                        
                        <tr class="trow">
                            <td><?php echo $Id; ?></td>
                            <td><?php echo $Service; ?></td>
                            <td><?php echo $Date; ?></td>
                            <td><?php echo $Time; ?></td>
                            <td> <a href="deletevisit.php?id=<?php echo $Id;?>" class="btn btn-primary">Complete</td>
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