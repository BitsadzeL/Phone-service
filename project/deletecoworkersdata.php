<?php
    require_once "conn.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM coworkers WHERE id = '$id'";

        if ($conn->query($query) === true) {
            header("location:coworkersmain.php");
        } else {
            echo "Error deleting record: " . $conn->error();
        }
    } else {
        echo "Invalid request.";
    }

    $conn->close();
?>
