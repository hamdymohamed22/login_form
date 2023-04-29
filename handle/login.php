<?php
require_once "../inc/conn.php";

if (isset($_POST['submit'])) {

    extract($_POST);

    //catch data
    $email = trim(htmlspecialchars($email));
    $password = trim(htmlspecialchars($password));
    // other way to prevent SQL injection

    // $email = mysqli_real_escape_string($conn, $email);
    // $password = mysqli_real_escape_string($conn, $password);

    // validate form inputs
    $errors_array = [];
    //email validate
    if (empty($email)) {
        $errors_array[] = "email is required.";
    } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors_array[] = "enter valid email.";
    }

    //password validate
    if (empty($password)) {
        $errors_array[] = "password is required.";
    } elseif (strlen($password) < 5) {
        $errors_array[] = "password should be more than 5 characters. ";
    } 


    if (empty($errors_array)) {

        $query = "SELECT * FROM `users` WHERE email = '$email'";
        $runQuery = mysqli_query($conn, $query);
        if (mysqli_num_rows($runQuery)==1) {
           $user =  mysqli_fetch_assoc($runQuery);
           $exist_Password = $user['password'];

           $is_match = password_verify($password, $exist_Password);
           if ($is_match) {
                $_SESSION['user_id'] = $user['id'];
                header("location:../index.php");
                exit;
           }else{
                $_SESSION['errors'] = ['credential is not correct'];
                header("location:../login.php");
                exit;
           }
        }else{
            $_SESSION['errors'] = ['credential is not correct'];
            header("location:../login.php");
            exit;
        }
  
    }else{
        $_SESSION['errors'] = $errors_array;
        header("location:../login.php");
        exit;
    }
    
}else{
    header("location:../login.php");
    exit;
}