<?php
require_once "../inc/conn.php";

if (isset($_POST['signup'])) {
    extract($_POST);
    //catch data
    $userName = trim(htmlspecialchars($userName));
    $email = trim(htmlspecialchars($email));
    $password = trim(htmlspecialchars($password));
    $phone = trim(htmlspecialchars($phone));
    //== validation
    $errors_array = [];
    // username  ========
    if (empty($userName)) {
        $errors_array[] = "username cant be empty";
    } elseif (is_numeric($userName)) {
        $errors_array[] = "enter valid username";
    }
    // email validate 
    if (empty($email)) {
        $errors_array[] = "email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors_array[] = "enter valid email.";
    }
    $check_email = "SELECT email FROM users WHERE email = '$email' ;";
    $runQuery = mysqli_query($conn,$check_email);
    if (mysqli_num_rows($runQuery) > 0) {
        $errors_array[] = "email alredy exist";
    }
    //password validate
    if (empty($password)) {
        $errors_array[] = "password is required.";
    } elseif (strlen($password) < 5) {
        $errors_array[] = "password should be more than 5 characters. ";
    } 
    // phone ==========
    if (empty($phone)) {
        $errors_array[] = "phone cant be empty";
    } elseif (!is_numeric($phone)) {
        $errors_array[] = "enter valid phone";
    }


    if (empty($errors_array)) {
        $password = password_hash($password,PASSWORD_BCRYPT);
        $query = "INSERT INTO `users`(`name`, `email`, `password`, `phone`) 
        VALUES('$userName','$email','$password','$phone')";
        $runQuery = mysqli_query($conn, $query);
        if ($runQuery) {
                header("location:../login.php");
                exit;
            } else {
                $_SESSION['errors'] = ['failed to create an account'];
                header("location:../signup.php");
                exit;
            }
        }else {
        $_SESSION['errors'] = $errors_array;
        header("location:../signup.php");
        exit;
    }
} else {
    header("location:../signup.php");
    exit;
}