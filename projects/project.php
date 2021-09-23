<?php

include_once '../static/dbconnect.php';

class Project {

    private $id;
    private $title;
    private $categorie;
    private $address;
    private $description;
    private $image;
    private $date;
    private $user_id;

    function getId() {
        return $this->id;
    }

    function getTitle() {
        return $this->title;
    }

    function getCategorie() {
        return $this->categorie;
    }

    function getAddress() {
        return $this->address;
    }

    function getDescription() {
        return $this->description;
    }

    function getImage() {
        return $this->image;
    }

    function getDate() {
        return $this->date;
    }

    function getUser_id() {
        return $this->user_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setCategorie($categorie) {
        $this->categorie = $categorie;
    }

    function setAddress($address) {
        $this->address = $address;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setDate($date) {
        $this->date = $date;
    }

    function setUser_id($user_id) {
        $this->user_id = $user_id;
    }

    function insert() {
        $object = new DBConnect();
        $conn = $object->conn;

        $sql = "INSERT INTO `project`"
                . "(`title`, `categorie`, `address`, `description`, `image`, `date`, `user_id`) "
                . "VALUES "
                . "('$this->title','$this->categorie','$this->address','$this->description','".addslashes($this->image)."',CURRENT_TIMESTAMP(),$this->user_id)";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if ($result) {
            $arr['response'] = 0;
        } else {
            $arr['response'] = mysqli_error($conn);
        }
        return $arr;
    }

    function update() {
        $object = new DBConnect();
        $conn = $object->conn;
        $sql = "UPDATE `project` SET `title`='$this->title',`categorie`='$this->categorie',`address`='$this->address',"
                . "`description`='$this->description',`image`='".addslashes($this->image)."',`date`=CURRENT_TIMESTAMP(),"
                . "`user_id`=$this->user_id WHERE `id`=$this->id";
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if ($result) {
            $arr['response'] = 0;
        } else {
            $arr['response'] = 1;
        }
        return $arr;
    }

    function delete() {
        $object = new DBConnect();
        $conn = $object->conn;
        $sql = "DELETE FROM `project` WHERE `id` = " . $this->id;
        $result = mysqli_query($conn, $sql);
        $arr = array();
        if ($result) {
            $arr['response'] = 0;
        } else {
            $arr['response'] = 1;
        }
        return $arr;
    }

    function find($index) {
        $object = new DBConnect();
        $conn = $object->conn;
        $sql = "";

        switch ($index) {
            case 0:
                $sql = "select * from `project`";
                break;
            case 1:
                $sql = "SELECT * FROM `project` WHERE `id` = " . $this->id;
                break;
        }

        $result = mysqli_query($conn, $sql);
        $arr = array();
        $i = 0;
        while ($row = mysqli_fetch_array($result)) {
            $arr[$i] = $row;
            $i++;
        }
        return $arr;
    }

}
