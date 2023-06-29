<?php
    require_once "conn.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM visits WHERE id = '$id'";

        if ($conn->query($query) === true) {
            header("location:viewvisits.php");
        } else {
            echo "Error deleting record: " . $conn->error();
        }
    } else {
        echo "Invalid request.";
    }

    $conn->close();
?>
