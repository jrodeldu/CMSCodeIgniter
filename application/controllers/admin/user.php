<?php

class User extends Admin_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->data['users'] = $this->user_m->get();
        $this->data['subview'] = 'admin/user/index';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function edit($id = NULL){

        // Si hay id se buscan los datos del usuario. Si no se crea una instancia con valores vacíos.
        if($id){
            $this->data['user'] = $this->user_m->get($id);
            count($this->data['user']) || $this->data['error'][''] = 'Usuario no encontrado';
        }else{
            $this->data['user'] = $this->user_m->get_new();
        }

        // Reglas de validación.
        $rules = $this->user_m->rules_admin;
        // Asumimos que tenemos un id y si no lo tenemos incluimos a las reglas la reestricción de campo requerido en password.
        $id || $rules['password']['rules'] .= '|required';
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            $data = $this->user_m->array_from_post(array('name', 'email', 'password'));
            // Si el password se dejó vacío no se debe actualizar por una string vacía así que se quita del array con array_pop.
            empty($data['password']) ? array_pop($data) : $data['password'] = $this->user_m->hash($data['password']);
            $this->user_m->save($data, $id); // Si id no es nulo será una actualización, si es nulo será una inserción nueva.
            redirect('admin/user');
        }

        $this->data['subview'] = 'admin/user/edit';
        $this->load->view('admin/_layout_main', $this->data);
    }

    public function delete($id){
        $this->user_m->delete($id);
        redirect('admin/user');
    }

    public function login(){

        $dashboard =  'admin/dashboard';
        // Asumimos que el usuario no está logueado y si lo está, lo redirigimos.
        $this->user_m->loggedin() == FALSE || redirect($dashboard);

        $rules = $this->user_m->rules;
        $this->form_validation->set_rules($rules);
        if($this->form_validation->run() == TRUE){
            // Se procede a logear al usuario.
            if($this->user_m->login() == TRUE){
                redirect($dashboard);
            }else{
                $this->session->set_flashdata('error', 'La combinación de email/password no es correcta');
                redirect('admin/user/login', 'refresh');
            }
        }
        $this->data['subview'] = 'admin/user/login';
        $this->load->view('admin/_layout_modal', $this->data);
    }

    public function logout(){
        $this->user_m->logout();
        redirect('admin/user/login');
    }

    /**
     * Callback para controlar email único
     * @param $email campo email desde el que se llama al callback
     * @return bool
     */
    public function _unique_mail($email){
        $id = $this->uri->segment(4);

        $this->db->where('email', $this->input->post('email'));
        // Asumimos que no tenemos id, si lo tenemos debemos evitar incluir el usuario.
        !$id || $this->db->where('id !=', $id); // Debemos controlar el email pero sin contar con el usuario actual.
        $user = $this->user_m->get();

        if(count($user)){
            $this->form_validation->set_message('_unique_mail', '%s ya existe en la Base de Datos');
            return FALSE;
        }

        return TRUE;
    }

}