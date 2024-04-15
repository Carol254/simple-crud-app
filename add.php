<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add new Customer</title>
</head>
<body>
    <h1>ADD CUSTOMER</h1>
    <form method="POST" action="save.php">
        
        <input type="text" name="fname">
        <input type="text" name="lname">
        <input type="text" name="email">
        <input type="text" name="age">
        <input type="text" name="gender">

        <button type="submit" value="Save">SAVE</button>
    </form>
</body>
</html>