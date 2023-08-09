<?php

class Auth extends Model
{

    //id, email, username, password
    public $id;
    public $email;
    public $username;
    public $password;
    public $db;
    private $table = "users";

    public function LoginUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return true;
        }
        return false;
    }
    public function registerUser($username, $password, $email)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";

        $result = $this->db->query($sql);

        if ($result->num_rows > 0) {
            return false;
        }
        $sql = "INSERT INTO users (email, username, password) VALUES ('$email','$username', '$password')";
        $result = $this->db->query($sql);
        return true;
    }
    public function getUser($username)
    {
        $sql = "SELECT * FROM users WHERE username = '$username'";
        $result = $this->db->query($sql);
        $user = $result->fetch_assoc();
        return $user;
    }

    public function updateUserInfo($username, $email)
    {
        $sql = "UPDATE users SET email = '$email' WHERE username = '$username'";
        $result = $this->db->query($sql);
        return true;
    }

    //update password user
    public function changePassword($username, $password, $newPassword)
    {
        if ($this->LoginUser($username, $password) == false) {
            return false;
        }
        $sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";
        $result = $this->db->query($sql);
        return true;
    }
    public function getRole( ){
        $sql = "SELECT * FROM roles";
        $result = $this->db->query($sql);
        $data = [];
        $i = 0;
        //kiểm có dữ liệu không
        if($result->num_rows > 0){
            //xuất dữ liệu từng dòng vào biến row
            while($row = $result->fetch_assoc()){
                //Gán dữ liệu vào mảng data
                $data[$i++] =  $row;
            }
        }
        return $data;
    }
}