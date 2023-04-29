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
    <title>Form Login</title>
</head>

<body>
    <div class="form-container">
        <h2>Login Form</h2>
        <form action="handle/login.php" method="post">
            <label for="Email">Email</label>
            <input type="text" id="email" name="email" placeholder="Enter Email">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password">
            <?php if (!empty($_SESSION['errors'])) {
            ?>
            <div class="error-message"><?php foreach ($_SESSION['errors'] as $error) {echo $error;}?></div>
            <?php } ?>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>