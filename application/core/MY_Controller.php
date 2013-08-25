<?php

/**
 * Class MY_Controller
 * Este controlador se ejecutará en cualquier zona de la web.
 * Es el padre de las clases Frontend_Controller y Admin_Controller
 * situadas en el directorio libraries.
 */

class MY_Controller extends CI_Controller {

    public $data = array();

    function __construct(){
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
    }

}