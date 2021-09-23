<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once 'message.php';
    $message = new Message();
    $too = $_GET['to'];
    $message->setToo($too);
    $result = $message->count_messeges();
    
    echo $result;
}