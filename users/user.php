<?php
    include_once '../static/dbconnect.php';
    class User{
        
        private $id;
    	private $fname;
    	private $lname;
    	private $phone;
    	private $username;
    	private $pass;
        
        function getId() {
            return $this->id;
        }

        function getFname() {
            return $this->fname;
        }

        function getLname() {
            return $this->lname;
        }

        function getPhone() {
            return $this->phone;
        }

        function getUsername() {
            return $this->username;
        }

        function getPass() {
            return $this->pass;
        }

        function setId($id) {
            $this->id = $id;
        }

        function setFname($fname) {
            $this->fname = $fname;
        }

        function setLname($lname) {
            $this->lname = $lname;
        }

        function setPhone($phone) {
            $this->phone = $phone;
        }

        function setUsername($username) {
            $this->username = $username;
        }

        function setPass($pass) {
            $this->pass = $pass;
        }

        function insert(){
            $object = new DBConnect();
            $conn = $object->conn;
            if(count($this->find(2)) <= 0){
                if(count($this->find(3)) <= 0){
                    $sql = "INSERT INTO `users`(`fname`, `lname`, `phone`, `username`, `pass`)"
                    . " VALUES ('".$this->fname."','".$this->lname."','".$this->phone."','".$this->username
                    ."','".$this->pass."')";
                    $result = mysqli_query($conn, $sql);
                    $arr = array();
                    if ($result) {
                        $arr['response'] = 0;
                    }else{
                        $arr['response'] = mysqli_error($conn);
                    }
                }else{
                        $arr['response'] = 1;
                }
            }else{
                $arr['response'] = 2;
            }  
            return $arr;
        }
        
        function update(){
            $object = new DBConnect();
            $conn = $object->conn;
            $sql = "UPDATE `users` SET `fname`='".$this->fname."',`lname`='".$this->lname."',`phone`='".$this->phone."',"
                    . "`username`='".$this->username."',`pass`='".$this->pass."' WHERE `id` = ".$this->id;
            $result = mysqli_query($conn, $sql);
            $arr = array();
            if ($result) {
                $arr['response'] = 0;
            }else{
                $arr['response'] = 1;
            }
            return $arr; 
        }
        
        function delete(){
            $object = new DBConnect();
            $conn = $object->conn;
            $sql = "DELETE FROM `users` WHERE `id` = " . $this->id;
            $result = mysqli_query($conn, $sql);
            $arr = array();
            if ($result) {
                $arr['response'] = 0;
            }else{
                $arr['response'] = 1;
            }
            return $arr; 
        }
        
        function find($index){
            $object = new DBConnect();
            $conn = $object->conn;
            $sql = "";
            
            switch ($index){
                case 0:
                    $sql = "select * from `users`";
                    break;
                case 1:
                    $sql = "SELECT * FROM `users` WHERE `id` = " . $this->id;
                    break;
                case 2:
                    $sql = "SELECT * FROM `users` WHERE `phone` = '" . $this->phone . "'";
                    break;
                case 3:
                    $sql = "SELECT * FROM `users` WHERE `username` = '" . $this->username . "'";
                    break;
                case 4:
                    $sql = "SELECT * FROM `users` WHERE `username` = '". $this->username 
                        ."' and `pass` = '". $this->pass ."'";
                    break;
            }
            
            $result = mysqli_query($conn, $sql);
            $arr = array();
            $i = 0;
            while ($row = mysqli_fetch_array($result)){
                $arr[$i] = $row;
                $i++;
            }
            return $arr;
        }
     
    }