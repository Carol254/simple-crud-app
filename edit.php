<?php

    $edited_id = $_GET['id'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "myCustomers";

    $conn = new mysqli($servername, $username, $password ,$dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id,firstname,lastname,email,age,gender FROM customerDetails WHERE id=". $edited_id."";

    $results = $conn->query($sql);

    if($results->num_rows > 0){
        
        $row = $results->fetch_assoc();

        echo $row["id"].'<br>';
        echo $row["firstname"].'<br>';
        echo $row["lastname"].'<br>';
        echo $row["email"].'<br>';
        echo $row["age"].'<br>';
        echo $row["gender"].'<br>';
        
        // echo 
        // "<form>
        //     <input type='text' name='fname' value='.$row["firstname"].'>;
        // </form>";
               
        
    }else{
        echo "0 results";
    }

    $conn->close();