<?php
session_start();

require_once("Lib/db.php");
require_once("Models/Model.php");
require_once("Controllers/BaseController.php");
//Đường dẫn thư mục
const PATH = __DIR__;
//Controller mặc định
$controller = "ProductController";
$action = "Index";
//Kiểm tra có controller trên đường link hay không
if (isset($_GET["controller"])) {
    $controller = ucfirst($_GET["controller"]) . "Controller";
    //Kiểm tra có action trên đường link hay không
    if (isset($_GET["action"])) {
        $action = $_GET["action"];
    }
}
require_once("Controllers/" . $controller . ".php");
$class = new $controller();
$class->$action();