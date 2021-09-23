<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'user.php';

    $user = new User();

    $fname = $_POST['fname'];
    $user->setFname($fname);
    $lname = $_POST['lname'];
    $user->setLname($lname);
    $phone = $_POST['phone'];
    $user->setPhone($phone);
    $username = $_POST['username'];
    $user->setUsername($username);
    $pass = $_POST['pass'];
    $user->setPass($pass);

    $result = $user->insert();
    
    $message = "";

    switch ($result['response']) {
        case 0:
            $message = "Votre inscription est réussi !";
            break;
        case 1:
            $sql = "Téléphone existe déja !";
            break;
        case 2:
            $sql = "Email existe déja !";
            break;
    }
    
    echo "<script>alert('$message')</script>";
    echo "<script>window.open('../login_signup.php', '_self')</script>";
}