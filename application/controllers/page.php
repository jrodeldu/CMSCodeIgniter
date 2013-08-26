<?php

class Page extends Frontend_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('page_m');
    }

    public function index(){
        $pages = $this->page_m->get();
        var_dump($pages);
    }

    /* Estas 2 funciones son de prueba del MY_Model*/
    public function save(){
        $data = array(
            'order'     => '3'
        );
        $id = $this->page_m->save($data, 3);
        var_dump($id);
    }

    public function delete(){
        $this->page_m->delete(3);
    }
}