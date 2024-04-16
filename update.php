<?php
        $servername = "localhost";
        $username = "root";
         $password = "";
        $dbname = "myCustomers";
     
        $customer_id = $_POST['c_id'];
        $customer_fname = $_POST['fname'];
        $customer_lname = $_POST['lname'];
        $customer_email = $_POST['email'];
        $customer_age = $_POST['age'];
        $customer_gender = $_POST['gender'];
    
        $conn = new mysqli($servername, $username, $password ,$dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        // sql to update a record
        
        $sql = "UPDATE customerDetails SET email = '".$customer_email."', firstname='".$customer_fname."', lastname='".$customer_lname."', age='".$customer_age."' , gender='".$customer_gender."' WHERE id='".$customer_id."' ";
        
    
        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

        $conn->close();

        header("Location: customers.php");
        exit();
   