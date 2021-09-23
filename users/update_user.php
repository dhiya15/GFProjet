<?php
$id = $_GET['id'];                         
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    include_once 'user.php';
    
    $user = new User();
    
    $user->setId($id);
    $fname = $_POST['fname'];                   $user->setFname($fname);
    $lname = $_POST['lname'];                   $user->setLname($lname);
    $phone = $_POST['phone'];                   $user->setPhone($phone);
    $username = $_POST['username'];             $user->setUsername($username);
    $pass = $_POST['pass'];                     $user->setPass($pass);
    
   $result = $user->update();
   
   if ($result['response'] == 0) {
        $message = "Reussir !";
        echo "<script>alert('$message')</script>";
        echo "<script>window.open('../home.php', '_self')</script>";
    }else{
        $message = "Erreur !";
        echo "<script>alert('$message')</script>";
        echo "<script>window.open('../profil.php', '_self')</script>";
    }
    
}
