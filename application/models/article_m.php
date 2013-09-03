<?php

class Article_m extends MY_Model {

    protected $_table_name      = 'articles';
    protected $_order_by        = 'pubdate desc, id desc';
    protected $_timestamps      = TRUE;
    public    $rules            = array(
        'title' =>  array(
            'field' => 'title',
            'label' => 'Título',
            'rules' => 'trim|required|max_length[100]|xss_clean'
        ),
        'slug' =>  array(
            'field' => 'slug',
            'label' => 'Slug',
            'rules' => 'trim|required|max_length[100]|url_title|xss_clean'
        ),
        'body' =>  array(
            'field' => 'body',
            'label' => 'Cuerpo',
            'rules' => 'trim|required'
        ),
        'pubdate' =>  array(
            'field' => 'pubdate',
            'label' => 'Fecha de publicación',
            'rules' => 'trim|exact_length[10]|xss_clean'
        )
    );


    /**
     * Función que crea una instancia de artículo
     * con campos vacíos para devolverlo en caso de
     * crear un artículo nuevo y no tener problemas de
     * repopulation del form.
     * @return stdClass
     */
    public function get_new(){
        $article = new stdClass();
        $article->title = '';
        $article->slug = '';
        $article->order = '';
        $article->body = '';
        $article->pubdate = date('Y-m-d');

        return $article;
    }
}