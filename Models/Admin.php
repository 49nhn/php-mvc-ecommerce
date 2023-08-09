<?php
require_once(PATH . "/Models/Auth.php");
require_once(PATH . "/Models/Product.php");
class Admin extends BaseController{

    public $auth;
    public $productModel;

    public function __construct()
    {
        parent::__construct();
        $this->auth = new Auth();
        $this->productModel = new Product();
    }
    public function isAdmin()
    {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $user = $this->auth->getUser($username);
            if ($user['role'] == 'admin') {
                return true;
            }
        }
        return false;
    }

    public function addProduct()
    {


    }
}