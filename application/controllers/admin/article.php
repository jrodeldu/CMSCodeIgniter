<?php

class Article extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('article_m');
    }

    public function index(){
        $this->data['articles'] = $this->article_m->get();
        $this->data['subview'] = 'admin/article/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){

        // Si hay id se buscan los datos del usuario. Si no se crea una instancia con valores vacíos.
        if($id){
            $this->data['article'] = $this->article_m->get($id);
            count($this->data['article']) || $this->data['errors'][] = 'Artículo no encontrado';
        }else{
            $this->data['article'] = $this->article_m->get_new();
        }

        // Reglas de validación.
        $rules = $this->article_m->rules;
        $this->form_validation->set_rules($rules);

        // Procesar el formulario.
        if($this->form_validation->run() == TRUE){
            $data = $this->article_m->array_from_post(array('title', 'slug', 'body', 'pubdate'));
            $this->article_m->save($data, $id); // Si id no es nulo será una actualización, si es nulo será una inserción nueva.
            redirect('admin/article');
        }

        $this->data['subview'] = 'admin/article/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        $this->article_m->delete($id);
        redirect('admin/article');
    }


}