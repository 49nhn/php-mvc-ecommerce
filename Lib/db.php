<?php
class db {

    const SERVERNAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DBNAME = "php2";

    

    public function connect(){
        $conn = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
        if ($conn->connect_error == false) {
            return $conn;
        }
    }
}