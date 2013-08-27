<?php

class Users extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }

}