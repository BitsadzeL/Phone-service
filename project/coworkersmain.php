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
</head>
<body>

<style>
    .trow:hover{
        color:red;
    }
</style>

<h1 style="text-align:center; margin: 50ox 0ox">Co-workers DataBase</h1>
    <section style="margin:50px 0px">
        <div class="container">
            <table class="table table-light">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Co-worker name</th>
                    <th scope="col">Co-worker surname</th>
                    <th scope="col"> Co-worker Personal ID</th>
                    <th scope="col"> Co-worker Position</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </thead>

                <tbody>
                    <?php
                    require_once "conn.php";
                    $sql_query = "SELECT * FROM coworkers";
                    if($result=$conn->query($sql_query)){
                        while($row=$result->fetch_assoc()){
                            $Id=$row["id"];
                            $Name=$row["name"];
                            $Surname=$row["surname"];
                            $Persid=$row["pers_id"];
                            $Position=$row["position"];
                            ?>
                        
                        <tr class="trow">
                            <td><?php echo $Id; ?></td>
                            <td><?php echo $Name; ?></td>
                            <td><?php echo $Surname; ?></td>
                            <td><?php echo $Persid; ?></td>
                            <td><?php echo $Position; ?></td>
                            <td> <a href="updatecoworkersdata.php?id=<?php echo $Id;?>"class="btn btn-primary">Edit</td>
                            <td> <a href="deletecoworkersdata.php?id=<?php echo $Id;?>" class="btn btn-primary">Delete</td>

                        </tr>


                    <?php
                        }
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </section>


    <h3 style="text-align:center; margin: 50ox 0ox">Add new Co-worker</h3>
    <section>
        <div class="container">
            <form action="addcoworker.php" method="post">
                <div class="row">

                    <div class="form-group col-lg-2">
                        <label for="name">Co-worker name: </label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="name">Co-worker surname: </label>
                        <input type="text" name="surname" id="surname" class="form-control" required>
                    </div>       
                    
                    <div class="form-group col-lg-2">
                        <label for="name">Co-worker personal ID: </label>
                        <input type="text" name="persid" id="persid" class="form-control" required>
                    </div>   
                    
                    <div class="form-group col-lg-2">
                        <label for="name">Co-worker position: </label>
                        <input type="text" name="position" id="position" class="form-control" required>
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
   
    
</body>
</html>