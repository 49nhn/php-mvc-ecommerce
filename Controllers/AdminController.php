<?php
require_once(PATH . "/Models/Admin.php");
require_once(PATH . "/Models/Product.php");
require_once(PATH . "/Models/Category.php");
class AdminController extends BaseController
{

    public $admin;
    public $productModel;

    public $categoryModel;

    public function __construct()
    {
        parent::__construct();
        $this->admin = new Admin();
        $this->productModel = new Product();
        $this->categoryModel = new Category();
    }
    public function index()
    {
        if ($this->admin->isAdmin()) {
            $products = $this->productModel->getAllProduct();

            foreach ($products as $key => $product) {
                $category = $this->categoryModel->getCategoryById($product['parent_id']);
                $products[$key]['parent_id'] = $category['name'];
            }
            return $this->view("Layouts.master", "Admin.index", ["title" => "Trang quản trị", "products" => $products]);
        }
        return $this->view("Layouts.master", "Auth.login", ["title" => "Đăng nhập"]);
    }
    public function addProductPost()
    {
        $name = $_POST['name'];
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $parent_id = $_POST['parent_id'];
        $price = $_POST['price'];
        $ttnb = $_POST['ttnb'];
        $bonho = $_POST['bonho'];
        $mau = $_POST['mau'];
        $chitiet = 'chi tiết';
        $title = $_POST['title'];
        $keyword = $_POST['keyword'];

        $file_name = $_FILES['img']['name'];
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        move_uploaded_file($file_tmp, "Public/images/san-pham/$file_name");
        $img = "/san-pham/$file_name";

        $description = $_POST['description'];
        $status = $this->productModel->add($name, $slug, $parent_id, $img, $price, $ttnb, $bonho, $mau, $chitiet, $title, $keyword, $description);
        if ($status) {
            header("Location: /index.php?controller=admin&action=index");
            return $this->view("Layouts.master", "Admin.index", ["title" => "Thêm sản phẩm", "message" => "Thêm sản phẩm thành công"]);
        }

        header("Location: /index.php?controller=admin&action=index");
        return $this->view("Layouts.master", "Admin.index", ["title" => "Thêm sản phẩm", "message" => "Thêm sản phẩm thất bại"]);
    }

    public function deleteProduct()
    {
        $id = $_GET['id'];
        $status = $this->productModel->deleteProduct($id);
        if ($status) {
            header("Location: /index.php?controller=admin&action=index");
            return $this->view("Layouts.master", "Admin.index", ["title" => "Xóa sản phẩm", "message" => "Xóa sản phẩm thành công"]);
        }
        header("Location: /index.php?controller=admin&action=index");
        return $this->view("Layouts.master", "Admin.index", ["title" => "Xóa sản phẩm", "message" => "Xóa sản phẩm thất bại"]);

    }

    public function editProduct()
    {
        $id = $_GET['id'];
        $product = $this->productModel->getProduct_id($id);
        foreach ($product as $key => $product) {
            $category = $this->categoryModel->getCategoryById($product['parent_id']);
            $product[$key]['parent_id'] = $category['name'];
        }
        return $this->view("Layouts.master", "Admin.edit", ["title" => "Sửa sản phẩm", "product" => $product]);
    }
    public function editProductSubmit()
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $name);
        $parent_id = $_POST['parent_id'];
        $price = $_POST['price'];
        $ttnb = $_POST['ttnb'];
        $bonho = $_POST['bonho'];
        $mau = $_POST['mau'];
        $chitiet = 'chi tiết';
        $title = $_POST['title'];
        $keyword = $_POST['keyword'];
        $img = $_POST['img'];
        $description = $_POST['description'];

        $status = $this->productModel->editProduct($id, $name, $slug, $parent_id, $img, $price, $ttnb, $bonho, $mau, $chitiet, $title, $keyword, $description);
        if ($status) {
            header("Location: /index.php?controller=admin&action=index");
            return $this->view("Layouts.master", "Admin.index", ["title" => "Sửa sản phẩm", "message" => "Sửa sản phẩm thành công"]);
        }
        header("Location: /index.php?controller=admin&action=index");
        return $this->view("Layouts.master", "Admin.index", ["title" => "Sửa sản phẩm", "message" => "Sửa sản phẩm thất bại"]);
    }

}