<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once 'message.php';
    
    $message = new Message();
    
    $froom = $_POST['from'];
    $message->setFroom($froom);
    $too = $_POST['to'];
    $message->setToo($too);
    $msg = $_POST['message'];
    $message->setMessage($msg);
    $about = $_POST['about'];
    $message->setAbout($about);
    
    $result = $message->insert();
    
    echo $result['response'];
}