<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <h3 style="text-align: center; text-decoration:underline;">CUSTOMER DATA</h3>
    <div class="main">
        
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "carolkui";
            $dbname = "myCustomers";

            $conn = new mysqli($servername, $username, $password ,$dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // echo "Connected successfully";

            //  $customers = "CREATE DATABASE myCustomers";
            
            //  if($conn->query($customers) === TRUE){
            //     echo "Database created successfully";
            //  }else{
            //     echo "Error creating Database" .$conn->error;
            //  }

            // $sql = "CREATE TABLE customerDetails(
            //     id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            //     firstname VARCHAR(30) NOT NULL,
            //     lastname VARCHAR(30) NOT NULL,
            //     email VARCHAR(50),
            //     age INT(4) NOT NULL,
            //     gender VARCHAR(30) NOT NULL
            // )";


            $sql = "SELECT id,firstname,lastname,email,age,gender FROM customerDetails";
            $results = $conn->query($sql);

            if($results->num_rows > 0){
                echo "<table><tr><th>ID</th><th>Firstname</th><th>LastName</th><th>Email</th><th>Age</th><th>Gender</th></tr>";

                while($row = $results->fetch_assoc()){
                    echo "<tr><td>".$row["id"] ."</td><td>".$row["firstname"] ."</td><td>".$row["lastname"] ."</td><td>".$row["email"] ."</td><td>".$row["age"] ."</td><td>".$row["gender"] ."</td></tr>";
                }
                echo "</table>";
            }else{
                echo "0 results";
            }



        
            $conn->close();
        ?>
    </div>
    
</body>
</html>