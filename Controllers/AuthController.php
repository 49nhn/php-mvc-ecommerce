<?php

class AuthController extends BaseController
{


    public function __construct()
    {
        parent::__construct();
    }
    
    public function login()
    {
        return $this->view("Layouts.auth", "Auth.login", ["title" => "Đăng nhập"]);
    }

    public function LoginUser()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $this->auth->LoginUser($username, $password);
        if ($status) {
            $_SESSION['username'] = $username;
           header ("Location: /index.php?controller=product&action=index");
        }
        
        return $this->view("Layouts.auth", "Auth.login", ["title" => "Đăng nhập", "message" => "Đăng nhập thất bại"]);
    }
    public function register()
    {
        return $this->view("Layouts.auth", "Auth.register", ["title" => "Đăng ký"]);
    }
    public function registerUser()
    {   
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $status = $this->auth->registerUser($username, $password, $email);
        if ($status)
            return $this->view("Layouts.auth", "Auth.login", ["title" => "Đăng nhập"]);

        return $this->view("Layouts.auth", "Auth.register", ["title" => "Đăng ký", "message" => "Đăng ký thất bại"]);
    }

    public function userInfo()
    {
        $username = $_SESSION['username'];
        $user = $this->auth->getUser($username);
        return $this->view("Layouts.master", "Auth.userInfo", ["title" => "Thông tin người dùng", "user" => $user]);
    }

    // public function updateUserInfo()
    public function updateUserInfo()
    {
        $username = $_SESSION['username'];
        $email = $_POST['email'];
        $status = $this->auth->updateUserInfo($username, $email);
        $user = $this->auth->getUser($username);
        if ($status) {
            return $this->view("Layouts.master", "Auth.userInfo", ["title" => "Thông tin người dùng", "user" => $user, "success" => "Cập nhật thành công"]);
        }
        return $this->view("Layouts.master", "Auth.userInfo", ["title" => "Thông tin người dùng", "user" => $user, "message" => "Cập nhật thất bại"]);
    }

    public function changePassword()
    {
        $username = $_SESSION['username'];
        $password = $_POST['password'];
        $newpassword = $_POST['newpassword'];
        $status = $this->auth->changePassword($username, $password, $newpassword);
        $user = $this->auth->getUser($username);
        if ($status) {
            return $this->view("Layouts.master", "Auth.userInfo", ["title" => "Thông tin người dùng", "user" => $user, "success" => "Cập nhật thành công"]);
        }
        return $this->view("Layouts.master", "Auth.userInfo", ["title" => "Thông tin người dùng", "user" => $user, "message" => "Cập nhật thất bại"]);

    }

    public function logout()
    {
        session_destroy();
        header("Location: /index.php?controller=product&action=index");
    }
}