<?php
require PATH . "/Models/CartItem.php";
class Cart extends Model
{
    public $id;
    public $user_id;
    public $db;
    public $table = "cart";
    public $CartItem;

    public function __construct()
    {
        parent::__construct();
        $this->CartItem = new CartItem();
    }
    public function getCart($user_id)
    {
        $sql = "SELECT * FROM cart WHERE user_id = '$user_id'";
        $result = $this->db->query($sql);
        if ($result->num_rows > 0) {
            $cart = $result->fetch_assoc();
            $cart_id = $cart['id'];
            $cart_items = $this->CartItem->getCartItemByCartId($cart_id);
            $cart['cart_items'] = $cart_items;
            $this->total($user_id);
            return $cart;
        } else {
            return false;
        }
    }

    public function addCart($user_id, $product_id, $quantity, $price)
    {
        
        try {
            $sql = "SELECT id FROM $this->table WHERE user_id = '$user_id'";
            $result = $this->db->query($sql);
            $id = $result->fetch_assoc();
            
            if ($result->num_rows > 0) {
                $this->CartItem->addCartItem($id['id'], $product_id, $quantity, $price);
            } else {
                $sql = "INSERT INTO $this->table (user_id, status) VALUES ('$user_id', '0')";
                $result = $this->db->query($sql);
                $this->CartItem->addCartItem($id['id'], $product_id, $quantity, $price);
                return true;
            }
        } catch (Exception $e) {
            return $e;
        }
    }
    public function total($user_id)
    {
        $sql = "SELECT SUM(price * quantity) AS total FROM cart_items INNER JOIN cart ON cart_items.cart_id = cart.id WHERE cart.user_id = '$user_id'";
        $result = $this->db->query($sql);
        $total = $result->fetch_assoc();
        return $total['total'];
    }
    public function getID($user_id)
    {
        $sql = "SELECT id FROM cart WHERE user_id = '$user_id'";
        $result = $this->db->query($sql);
        $id = $result->fetch_assoc();
        return $id['id'];
    }

}