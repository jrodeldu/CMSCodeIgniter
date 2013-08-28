<?php

class Admin_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->data['meta_title'] = 'My Admin Panel';
        $this->load->model('user_m');
    }

}