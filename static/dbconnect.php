<?php

class DBConnect {

    private $host = "localhost";
    private $db = "projects";
    private $user = "root";
    private $pass = "";
    public $conn;

    function __construct() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } else {
            $sql = "CREATE TABLE IF NOT EXISTS users (
						    id INT(10) PRIMARY KEY AUTO_INCREMENT,
						    fname VARCHAR(30) NOT NULL,
						    lname VARCHAR(30) NOT NULL,
						    phone VARCHAR(30) NOT NULL UNIQUE,
						    username VARCHAR(50) NOT NULL UNIQUE,
						    pass VARCHAR(50) NOT NULL
						);";
            $sql2 = "CREATE TABLE IF NOT EXISTS project (
						    id INT(10) AUTO_INCREMENT PRIMARY KEY,
						    title VARCHAR(50) NOT NULL,
						    categorie VARCHAR(50) NOT NULL,
                                                    address VARCHAR(50) NOT NULL,
						    description TEXT NOT NULL,
                                                    image LONGBLOB,
						    date DATETIME NOT NULL,
						    user_id INT NOT NULL,
						    CONSTRAINT FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
						);";
            $sql3 = "CREATE TABLE IF NOT EXISTS message (
						    id INT(10) AUTO_INCREMENT PRIMARY KEY,
						    froom INT NOT NULL,
						    too INT NOT NULL,
                                                    about INT NOT NULL,
						    message TEXT NOT NULL,
						    date DATETIME NOT NULL,
						    notify TINYINT(1) NOT NULL,
                                                    readed TINYINT(1) NOT NULL,
                                                    hidefroom TINYINT(1) NOT NULL,
                                                    hidetoo TINYINT(1) NOT NULL,
						    CONSTRAINT FOREIGN KEY (froom) REFERENCES users(id),
                                                    CONSTRAINT FOREIGN KEY (too) REFERENCES users(id),
                                                    CONSTRAINT FOREIGN KEY (about) REFERENCES project(id)
						);";
            $result = mysqli_query($this->conn, $sql)  && 
            	      mysqli_query($this->conn, $sql2) &&
                      mysqli_query($this->conn, $sql3);
            if ($result) {
                
            } else {
                echo "Error creating table: " . mysqli_error($this->conn);
            }
        }
    }

}
