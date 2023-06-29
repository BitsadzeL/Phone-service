<?php
    require_once "conn.php";
    if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $surname=$_POST['surname'];
        $persid=$_POST['persid'];
        $position=$_POST['position'];


        if($name!="" && $surname!=""&&$persid!="" && $position!=""){
            $sql="INSERT INTO coworkers(`name`, `surname`,`pers_id`, `position`) 
            VALUES ('$name', '$surname', '$persid', '$position')";
            if(mysqli_query($conn,$sql)){
                header("location:coworkersmain.php");
            }else{
                echo "SOMETHING WENT WRONG!";
            }
        }
    }else{
        echo "Fields must not be empty!";
    }
?>