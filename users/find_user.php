<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once 'user.php';
    
    $user = new User();
    
    $username = $_POST['username'];             
    $user->setUsername($username);
    $pass = $_POST['pass'];                     
    $user->setPass($pass);
    
    $result = $user->find(4);

    if ($result != NULL) {
        session_start();
        $_SESSION['result'] = $result[0]['id'];
        echo "<script>window.open('../home.php', '_self')</script>";
    }else{
        $message = "Email ou Mot de passe est incorrect !";
        echo "<script>alert('$message')</script>";
        echo "<script>window.open('../login_signup.php', '_self')</script>";
    }
       
}