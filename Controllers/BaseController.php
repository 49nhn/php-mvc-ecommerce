<?php
class BaseController {
    //Đường dẫn Thư mục view
    const PATH_VIEW = "Views"; 
    public $categoryModel;
    public $bannerModel;

    public $auth;

    public function __construct(){
        require_once (PATH ."/Models/Category.php");
        $this->categoryModel = new Category();
        require_once (PATH ."/Models/Banner.php");
        $this->bannerModel = new Banner();
        require_once (PATH ."/Models/Auth.php");
        $this->auth = new Auth();
    }

    public function view($layout = null, $view = null, array $data = []){

        $banner = $this->bannerModel->getBanner();

        $menu = $this->categoryModel->getMenu(1);

        $menu2 = $this->categoryModel->getMenu(2);

        $userInfo = $this->userInfobase();

        foreach($data as $key => $value){
            $$key = $value;
        }
        $view = $this->getPath($view);
        require_once $this->getPath($layout);
    }

    // $path = News.category;
    private function getPath($path){
        $path = str_replace( ".", "/", $path);
        // News/category
        $path = self::PATH_VIEW . "/" . $path . ".php";
        // Views/News.category.php
        return $path;
    }

    public function userInfobase()
    {
        if(!isset($_SESSION['username'])){
            return null;
        }
        $username = $_SESSION['username'];
         return $user = $this->auth->getUser($username);
    }
}