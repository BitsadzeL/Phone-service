<?php
    define('db_server','localhost');
    define('db_username','root');
    define('db_pass','');
    define('db_name','project');
    $conn=mysqli_connect(db_server,db_username,db_pass,db_name);

    if($conn===false){
        die("ERROR: Could not connecrt". mysqli_connect_error());
    }
?>