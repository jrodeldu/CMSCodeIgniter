<?php

class Page extends Admin_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('page_m');
    }

    public function index(){
        $this->data['pages'] = $this->page_m->get();
        $this->data['subview'] = 'admin/page/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){

        // Si hay id se buscan los datos del usuario. Si no se crea una instancia con valores vacíos.
        if($id){
            $this->data['page'] = $this->page_m->get($id);
            count($this->data['page']) || $this->data['error'][''] = 'Usuario no encontrado';
        }else{
            $this->data['page'] = $this->page_m->get_new();
        }

        // Reglas de validación.
        $rules = $this->page_m->rules;
        $this->form_validation->set_rules($rules);

        // Procesar el formulario.
        if($this->form_validation->run() == TRUE){
            $data = $this->page_m->array_from_post(array('title', 'slug', 'body'));
            $this->page_m->save($data, $id); // Si id no es nulo será una actualización, si es nulo será una inserción nueva.
            redirect('admin/page');
        }

        $this->data['subview'] = 'admin/page/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        $this->page_m->delete($id);
        redirect('admin/page');
    }

    /**
     * Callback para controlar slug único.
     * NO SE VALIDARÁ si ya existe un slug idéntico (sin contar el de la página en caso de edición del mismo)
     * @param $slug campo slug desde el que se llama al callback
     * @return bool
     */
    public function _unique_slug($slug){
        $id = $this->uri->segment(4);

        $this->db->where('slug', $this->input->post('slug'));
        // Asumimos que no tenemos id, si lo tenemos debemos evitar incluir el usuario.
        !$id || $this->db->where('id !=', $id); // Debemos controlar el email pero sin contar con el usuario actual.
        $page = $this->page_m->get();

        if(count($page)){
            $this->form_validation->set_message('_unique_slug', '%s ya existe en la Base de Datos.');
            return FALSE;
        }

        return TRUE;
    }

}