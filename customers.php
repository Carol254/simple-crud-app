<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    
    <div class="">
        <div class="banner d-flex justify-content-evenly align-items-center">
            <h3 class="my-2 text-white">CUSTOMER DATA</h3>
            <div class="d-flex">
                <div><button class="btn btn-danger mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><span><img src="assets/trash2.svg" ></span>DELETE CUSTOMERS</button></div>
                <div><a class="btn btn-success mt-1" href="add.php"><span><img src="assets/add.svg" ></span>CREATE CUSTOMER</a></div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
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
       
       <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Customers</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete these Records?<br>
                    <small>This action cannot be undone.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
    </div>
   
</body>
</html>