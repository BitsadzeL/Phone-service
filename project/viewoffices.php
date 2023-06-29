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

<h1 style="text-align:center; margin: 50ox 0ox">Our offices</h1>
    <section style="margin:50px 0px">
        <div class="container">
            <table class="table table-light">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col"> Working hours</th>
                    <th scope="col"></th>
                </thead>

                <tbody>
                    <?php
                    require_once "conn.php";
                    $sql_query = "SELECT * FROM offices order by city desc";
                    if($result=$conn->query($sql_query)){
                        while($row=$result->fetch_assoc()){
                            $Id=$row["id"];
                            $City=$row["city"];
                            $Address=$row["address"];
                            $Time=$row["working_hours"];
                            ?>
                        
                        <tr class="trow">
                            <td><?php echo $Id; ?></td>
                            <td><?php echo $City; ?></td>
                            <td><?php echo $Address; ?></td>
                            <td><?php echo $Time; ?></td>
                            
                        </tr>
                        


                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
            <a href="panel.php">
                <button class="btn btn-danger">Back</button>
            </a> 
        </div>
    </section>