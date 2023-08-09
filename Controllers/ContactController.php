<?php

class ContactController extends BaseController
{

    public function index()
    {
        return $this->view("Layouts.master", "Contact.index");
    }

}