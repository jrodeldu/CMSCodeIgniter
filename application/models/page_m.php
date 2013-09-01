<?php

class Page_m extends MY_Model {

    protected $_table_name      = 'pages';
    protected $_order_by        = 'order';
    public    $rules            = array(
        'title' =>  array(
            'field' => 'title',
            'label' => 'Título',
            'rules' => 'trim|required|max_length[100]|xss_clean'
        ),
        'slug' =>  array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|max_length[100]|url_title|callback__unique_slug|xss_clean'
        ),
        'body' =>  array(
            'field' => 'body',
            'label' => 'Cuerpo',
            'rules' => 'trim|required'
        )
    );


    /**
     * Función que crea una instancia de página
     * con campos vacíos para devolverlo en caso de
     * crear una página nueva y no tener problemas de
     * repopulation del form.
     * @return stdClass
     */
    public function get_new(){
        $page = new stdClass();
        $page->title = '';
        $page->slug = '';
        $page->order = '';
        $page->body = '';

        return $page;
    }
}