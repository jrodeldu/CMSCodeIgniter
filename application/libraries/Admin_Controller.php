<?php

class Admin_Controller extends MY_Controller {

    function __construct(){
        parent::__construct();
        $this->data['meta_title'] = 'My Admin Panel';
        $this->load->model('user_m');

        // Control de sesión en zona admin.
        // Url en la que queremos que dicho control no se haga:
        $exception_urls = array(
            'admin/user/login',
            'admin/user/logout'
        );
        if(in_array(uri_string(), $exception_urls) == FALSE){
            if($this->user_m->loggedin() == FALSE){
                redirect('admin/user/login');
            }
        }
    }

}