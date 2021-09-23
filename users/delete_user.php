<?php

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once 'user.php';

    $user = new User();

    $id = $_GET['id'];
    $user->setId($id);

    $result = $user->delete();

    if ($result['response'] == 0) {
        session_start();
        session_destroy();
        $message = "Reussir !";
        echo "<script>alert('$message')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    } else {
        $message = "Erreur !";
        echo "<script>alert('$message')</script>";
        echo "<script>window.open('../profil.php', '_self')</script>";
    }
}

