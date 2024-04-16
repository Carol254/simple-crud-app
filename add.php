<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Customer</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h3 class="text-center banner text-white py-2">ADD CUSTOMER</h3>
 
    <div class="container w-80 m-auto">
        <form method="POST" action="save.php">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" class="form-control" id="firstname" aria-describedby="" placeholder="Enter your firstname" name="fname">
            </div>
            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" class="form-control" id="lastname" aria-describedby="" placeholder="Enter your lastname" name="lname">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" aria-describedby="" placeholder="Enter your email" name="email">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" aria-describedby="" placeholder="Enter your age" name="age">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" id="gender" aria-describedby="" placeholder="Enter your gender" name="gender">
            </div>
            
            <button type="submit" class="mt-2 submit-btn" value="Save">Submit</button>
        </form>
    </div>
</body>
</html>

