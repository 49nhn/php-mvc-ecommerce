<?php
require_once(PATH . "/Models/Cart.php");
require_once(PATH . "/Models/Auth.php");
require_once(PATH . "/Models/DetailProduct.php");
require_once(PATH . "/Models/Product.php");
require_once(PATH . "/Models/CartItem.php");
class CartController extends BaseController
{

    public $cartModel;
    public $userModel;
    public $productModel;

    public $products;

    public $cartitems;
    public $cartitemModel;


    public function __construct()
    {
        parent::__construct();
        $this->cartModel = new Cart();
        $this->userModel = new Auth();
        $this->productModel = new DetailProduct();
        $this->products = new Product();
        $this->cartitemModel = new CartItem();

    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $username = $_SESSION['username'];
            $userID = $this->userModel->getUser($username)['id'];
            $carts = $this->cartModel->getCart($userID);
        } else {
            $carts = [];
        }
        if (!$carts) {
            $this->view("Layouts.master", "Cart.index", [
                'cartitems' => [], 'total' => 0
            ]);
        }
        $this->cartitems = $carts['cart_items'];

        for ($i = 0; $i < count($this->cartitems); $i++) {
            $product_id = $this->cartitems[$i]['product_id'];
            $product = $this->productModel->getProductByID($product_id)[0];
            $productName = $product['name'];
            $productImage = $product['img'];

            $this->cartitems[$i]['name'] = $productName;
            $this->cartitems[$i]['img'] = $productImage;
        }
        $total = $this->cartModel->total($userID);
        $this->view("Layouts.master", "Cart.index", [
          'cartitems' => $this->cartitems, 'total' => $total
        ]);
    }

    public function addToCart()
    {   
        if(!isset($_SESSION['username'])){
            return  header("Location: /index.php?controller=auth&action=login");
        }

        $username = $_SESSION['username'];
        $product_id = $_GET['productID'];
        $price = $this->productModel->getProductByID($product_id)[0]['price'];
        $quantity = 1;
        $user_id = $this->userModel->getUser($username)['id'];
        $this->cartModel->addCart($user_id, $product_id, $quantity, $price);
        return  header("Location: /index.php?controller=cart&action=index");
    }

    public function removeItem()
    {
        $product_id = $_GET['productID'];
        $username = $_SESSION['username'];
        $user_id = $this->userModel->getUser($username)['id'];
        $cart_id = $this->cartModel->getCart($user_id)['id'];
        $status = $this->cartitemModel->deleteCartItem($cart_id, $product_id);
        if ($status) {
            return  header("Location: /index.php?controller=cart&action=index");
        }
        return  header("Location: /index.php?controller=cart&action=index");
    }

    public function updateCart()
    {
        $product_id =  $_GET['productID'];
        $quantity = $_GET['quantity'];
        $username = $_SESSION['username'];
        $user_id = $this->userModel->getUser($username)['id'];
        $cart_id = $this->cartModel->getCart($user_id)['id'];
        $status = $this->cartitemModel->updateCartItem($cart_id, $product_id, $quantity);
        if ($status) {
            return  header("Location: /index.php?controller=cart&action=index");
        }
        return  header("Location: /index.php?controller=cart&action=index");
    }
}