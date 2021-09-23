<?php

include_once '../static/dbconnect.php';

class Message {

    private $id;
    private $froom;
    private $too;
    private $about;
    private $message;
    private $date;
    private $notify;

    function getId() {
        return $this->id;
    }

    function getFroom() {
        return $this->froom;
    }

    function getToo() {
        return $this->too;
    }

    function getAbout() {
        return $this->about;
    }

    function setAbout($about) {
        $this->about = $about;
    }

    function getMessage() {
        return $this->message;
    }

    function getDate() {
        return $this->date;
    }

    function getNotify() {
        return $this->notify;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setFroom($froom) {
        $this->froom = $froom;
    }

    function setToo($too) {
        $this->too = $too;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setNotify($notify) {
        $this->notify = $notify;
    }

    function insert() {
        $object = new DBConnect();
        $conn = $object->conn;

        $sql = "INSERT INTO `message`"
                . "(`froom`, `too`, `about`, `message`, `date`, `notify`, `readed`, `hidefroom`, `hidetoo`) "
                . "VALUES "
                . "($this->froom,$this->too,$this->about,'$this->message',CURRENT_TIMESTAMP(),1,0,0,0)";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if ($result) {
            $arr['response'] = 0;
        } else {
            $arr['response'] = mysqli_error($conn);
        }
        return $arr;
    }

    function find() {
        $object = new DBConnect();
        $conn = $object->conn;

        $sql = "SELECT * FROM `messgae` WHERE `id` = " . $this->id;

        $result = mysqli_query($conn, $sql);
        $arr = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $arr[$i] = $row;
            $i++;
        }
        return $arr;
    }

    function count_messeges() {
        $object = new DBConnect();
        $conn = $object->conn;

        $sql = "SELECT COUNT(*) FROM `message` WHERE `too`=$this->too AND `notify`=1";

        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        return $row['COUNT(*)'];
    }

    function hide($index) {
        $object = new DBConnect();
        $conn = $object->conn;

        $sql = "";
        switch ($index) {
            case 0:
                $sql = "UPDATE `message` SET `hidefroom`=1 WHERE `id`=$this->id";
                break;
            case 1:
                $sql = "UPDATE `message` SET `hidetoo`=1 WHERE `id`=$this->id";
                break;
        }

        $result = mysqli_query($conn, $sql);
        $arr = array();
        if ($result) {
            $arr['response'] = 0;
        } else {
            $arr['response'] = mysqli_error($conn);
        }
        return $arr;
    }

}
