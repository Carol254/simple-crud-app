
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
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

        echo "<h2 class='banner text-white text-center py-2'>Update Customer</h2>";
        
        echo 
        "<div class='container'>
            <form method='POST' action='update.php'>
                <input type='hidden' name='c_id' value='" . $row["id"] . "'>
                <div class='form-group'>
                    <label for='firstname'>First Name</label>
                    <input type='text' class='form-control' id='firstname' name='fname' aria-describedby='' value='" . $row["firstname"] . "'>
                </div>
                <div class='form-group'>
                    <label for='lastname'>Last Name</label>
                    <input type='text' class='form-control' id='lastname' name='lname' aria-describedby='' value='" . $row["lastname"] . "'>
                </div>
                <div class='form-group'>
                    <label for='email'>Email</label>
                    <input type='text' class='form-control' id='email' name='email' aria-describedby='' value='" . $row["email"] . "'>
                </div>
                <div class='form-group'>
                    <label for='age'>Age</label>
                    <input type='text' class='form-control' id='age' name='age' aria-describedby='' value='" . $row["age"] . "'>
                </div>
                <div class='form-group'>
                    <label for='gender'>Gender</label>
                    <input type='text' class='form-control' id='gender' name='gender' aria-describedby='' value='" . $row["gender"] . "'>
                </div>


                <button type='submit' class='submit-btn mt-2' value='Save'>UPDATE</button>


                </form>
        </div>";   
    }else{
        echo "0 results";
    }
    $conn->close();
    exit();
    ?>
</body>
</html>
