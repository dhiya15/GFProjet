<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    include_once 'message.php';
    
    $message = new Message();
    
    $id = $_GET['idMsg'];
    $message->setId($id);
    
    $result = $message->hide(0);
    
    echo "<script>window.open('../all_my_messages.php', '_self')</script>";
    
}