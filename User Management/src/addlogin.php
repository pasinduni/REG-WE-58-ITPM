<?php

//if (is_user_logged_in()) {
//    redirect_to('index.php');
//}


$inputs = [];

if (is_post_request()) {
    
    
    $name = mysqli_real_escape_string($mysqli, $_POST['name']);
    $username = mysqli_real_escape_string($mysqli, $_POST['username']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $designation = mysqli_real_escape_string($mysqli, $_POST['designation']);
    $role = mysqli_real_escape_string($mysqli, $_POST['role']);

    $passwordh = password_hash($password, PASSWORD_BCRYPT);


    $result = mysqli_query($mysqli, "INSERT INTO users(name,username,password,designation,role) VALUES('$name','$username','$passwordh','$designation','$role')");
    redirect_with_message('addlogin.php','Added Succsfully');
    
} 



