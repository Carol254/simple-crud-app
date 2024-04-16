<?php
        $servername = "localhost";
        $username = "root";
      $password = "";
        $dbname = "myCustomers";
     
        $customer_fname = $_POST['fname'];
        $customer_lname = $_POST['lname'];
        $customer_email = $_POST['email'];
        $customer_age = $_POST['age'];
        $customer_gender = $_POST['gender'];
    
        $conn = new mysqli($servername, $username, $password ,$dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        // sql to sav a new record
        
        $sql = "INSERT INTO customerDetails (firstname,lastname,email,age,gender) VALUES('".$customer_fname."','".$customer_lname."','".$customer_email."','".$customer_age."','".$customer_gender."')";
        
    
        if ($conn->query($sql) === TRUE) {
            echo "Record inserted successfully";
        } else {
            echo "Error inserting record: " . $conn->error;
        }

        $conn->close();

        header("Location: customers.php");
        exit();
   