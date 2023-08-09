<?php

class NewsController extends BaseController{

    public function index(){
        return $this->view("News.index");
    }

    public function category(){
        return $this->view("News.category");
    }
}