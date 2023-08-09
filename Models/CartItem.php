<?php
class CartItem extends Model
{
    public $cartid;
    public $product_id;
    public $quantity;
    public $db;
    public $table = "cart_items";

    public function __construct()
    {
        $this->db = $this->connect();
    }

    public function getCartItemByCartId($cart_id)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE cart_id = $cart_id";
            $result = $this->db->query($sql);
            $data = [];
            $i = 0;
            //kiểm có dữ liệu không
            if ($result->num_rows > 0) {
                //xuất dữ liệu từng dòng vào biến row
                while ($row = $result->fetch_assoc()) {
                    //Gán dữ liệu vào mảng data
                    $data[$i++] = $row;
                }
            }
            return $data;
        } catch (Exception $e) {
            return $e;
        }
    }
    public function addCartItem($cart_id, $product_id, $quantity, $price)
    {
        try {
            $sql = "SELECT * FROM $this->table WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
            $result = $this->db->query($sql);
            if ($result->num_rows > 0) {
                $sql = "UPDATE $this->table SET quantity = quantity + '$quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
                $result = $this->db->query($sql);
                return true;
            } else {
                $sql = "INSERT INTO $this->table (cart_id, product_id, quantity, price) VALUES ('$cart_id', '$product_id', '$quantity', '$price')";
                $result = $this->db->query($sql);
                return true;
            }
        } catch (Exception $e) {
            return $e;
        }
    }

    public function updateCartItem($cart_id, $product_id, $quantity)
    {
        $quantityOld = $this->getQuatity($cart_id, $product_id);

        $quantityOld = $quantityOld[0]['quantity'];
        $quantity = $quantity + $quantityOld;
        if ($quantity <= 0) {
            return $this->deleteCartItem($cart_id, $product_id);
        }
        try {
            $sql = "UPDATE $this->table SET quantity = '$quantity' WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
            $result = $this->db->query($sql);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
    public function deleteCartItem($cart_id, $product_id)
    {
        try {
            $sql = "DELETE FROM $this->table WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
            $result = $this->db->query($sql);
            return true;
        } catch (Exception $e) {
            return $e;
        }
    }
    public function getQuatity($cart_id, $product_id)
    {
        try {
            $sql = "SELECT quantity FROM $this->table WHERE cart_id = '$cart_id' AND product_id = '$product_id'";
            $result = $this->db->query($sql);
            $data = [];
            $i = 0;
            //kiểm có dữ liệu không
            if ($result->num_rows > 0) {
                //xuất dữ liệu từng dòng vào biến row
                while ($row = $result->fetch_assoc()) {
                    //Gán dữ liệu vào mảng data
                    $data[$i++] = $row;
                }
            }
            return $data;
        } catch (Exception $e) {
            return $e;
        }
    }

}