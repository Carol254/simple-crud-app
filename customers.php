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
            $password = "";
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
                echo "<table>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>LastName</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>";

                while($row = $results->fetch_assoc()){
                    echo 
                    "<tr>
                        <td>".$row["id"] ."</td>
                        <td>".$row["firstname"] ."</td>
                        <td>".$row["lastname"] ."</td>
                        <td>".$row["email"] ."</td>
                        <td>".$row["age"] ."</td>
                        <td>".$row["gender"] ."</td>
                        <td onclick='onEdit(".$row["id"].")'><img src='assets/edit.svg'></td>
                        <td onclick='onDelete(".$row["id"].")'><img  src='assets/trash.svg'></td>
                    </tr>";
                }
                echo "</table>";
            }else{
                echo "0 results";
            }

            $conn->close();
        ?>
    </div>
    
    <script>
        function onDelete(id){
            console.log ('deleted', id);
            // window.alert('Customer '+ id + ' deleted successfully');

            window.location.href = 'delete.php?id=' + id;
        }

        function onEdit(id){
            console.log ('edited', id);
            // window.alert('Customer '+ id + ' edited successfully');

            window.location.href = 'edit.php?id=' + id;
        }
    </script>
</body>
</html>