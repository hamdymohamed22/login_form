<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SignUP</title>
</head>

<body>
    <div class="form-container">
        <h2>Sign Up</h2>
        <form action="handle/login.php" method="post">

            <label for="userName">User Name</label>
            <input type="text" id="userName" name="userName" placeholder="Enter name">

            <label for="phone">phone</label>
            <input type="text" id="phone" name="phone" placeholder="Enter phone">

            <label for="Email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter Email">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password">

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>