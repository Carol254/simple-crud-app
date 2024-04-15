<?php

    $deletedid = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myCustomers";

    $conn = new mysqli($servername, $username, $password ,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // echo 'delete file executed '.$deletedid;

    // sql to delete a record
    $sql = "DELETE FROM customerDetails WHERE id=".$deletedid." ";

    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }

    $conn->close();

    header("Location: customers.php");
    exit();
?>