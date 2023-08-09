<?php
class Product extends Model
{

    private $table = "products";

    //Thêm dữ liệu
    public function add($name, $slug, $parent_id, $img, $price, $ttnb, $bonho, $mau, $chitiet, $title, $keyword, $description)
    {
        $sql = "INSERT INTO $this->table (name, slug, parent_id, img, price, ttnb, bonho, mau, chitiet, title, keyword, description)
        VALUES ('$name', '$slug', $parent_id,  '$img', $price, '$ttnb', '$bonho', '$mau', '$chitiet', '$title', '$keyword', '$description')";
        if ($this->db->query($sql) == TRUE) {
            $sql = "";
            $this->db->insert_id;
        } else {
            return 0;
        }
    }

    //Lấy tất cả dữ liệu
    public function getAll()
    {
        $sql = "SELECT * FROM products";
        $data = $this->db->query($sql);
        return $data;
    }
    //get All product
    public function getAllProduct()
    {
        $sql = "SELECT * FROM products";
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
    }

    //Lấy dữ liệu theo id
    public function getProduct_id($id)
    {
        $sql = "SELECT * FROM products where id = $id";
        $data = $this->db->query($sql);
        return $data;
    }

    //Lấy dữ liệu theo search
    public function getProduct_where($s)
    {
        $sql = "SELECT * FROM products where $s";
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
    }
    //Lấy dữ liệu theo dạng phân trang
    public function getProduct_page($size, $pagesize)
    {
        $skip = ($pagesize - 1) * $size;
        $sql = "SELECT * FROM products LIMIT $skip, $size";
        $data = $this->db->query($sql);
        return $data;
    }
    //Cập nhật dữ liệu
    public function updateProduct($sea, $upd)
    {
        $sql = "UPDATE products SET $upd WHERE id = $sea";
        if ($this->db->query($sql) === TRUE) {
            $this->db->insert_id;
        } else {
            return 0;
        }
    }

    //Xóa dữ liệu
    public function deleteProduct($id)
    {
        $sql = "DELETE FROM products WHERE id = $id";
        if ($this->db->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }
    public function editProduct(
        $id,
        $name,
        $slug,
        $parent_id,
        $img,
        $price,
        $ttnb,
        $bonho,
        $mau,
        $chitiet,
        $title,
        $keyword,
        $description
    ) {
        $sql = "UPDATE products SET 
        name = '$name',
        slug = '$slug',
        parent_id = $parent_id,
        img = '$img',
        price = $price,
        ttnb = '$ttnb',
        bonho = '$bonho',
        mau = '$mau',
        chitiet = '$chitiet',
        title = '$title',
        keyword = '$keyword',
        description = '$description'
        WHERE id = $id";
        if ($this->db->query($sql) === TRUE) {
            return 1;
        } else {
            return 0;
        }
    }


}