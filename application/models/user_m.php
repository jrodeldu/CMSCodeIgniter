<?php

class User_m extends MY_Model {

    protected $_table_name      = 'users';
    protected $_order_by        = 'name';
    // Reglas login usuario
    public    $rules            = array(
        'email' =>  array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'password' =>  array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required'
        )
    );
    // Reglas para insertar/editar usuarios
    public    $rules_admin      = array(
        'name' =>  array(
            'field' => 'name',
            'label' => 'Nombre',
            'rules' => 'trim|required|xss_clean'
        ),
        'email' =>  array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|callback__unique_mail|xss_clean'
        ),
        'password' =>  array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|matches[password_confirm]'
        ),
        'password_confirm' =>  array(
            'field' => 'password_confirm',
            'label' => 'Confirmar password',
            'rules' => 'trim|matches[password]'
        )
    );

    public function __construct(){
        parent::__construct();
    }

    public function login(){
        $user = $this->get_by(array(
            'email' => $this->input->post('email'),
            'password' => $this->hash($this->input->post('password'))
        ), TRUE);

        if(count($user)){
            // Se encontró un usuario
            $data = array(
                'user' => $user->name,
                'email' => $user->email,
                'id' => $user->id,
                'loggedin' => TRUE,
            );
            $this->session->set_userdata($data);
        }
    }

    public function logout(){
        $this->session->sess_destroy();
    }

    public function loggedin(){
        return (bool) $this->session->userdata('loggedin');
    }

    public function hash($string){
        return hash('sha512', $string . config_item('encryption_key'));
    }

    /**
     * Función que crea una instancia de usuario
     * con campos vacíos para devolverlo en caso de
     * crear un usuario nuevo y no tener problemas de
     * repopulation del form.
     * @return stdClass
     */
    public function get_new(){
        $user = new stdClass();
        $user->name = '';
        $user->email = '';
        $user->password = '';

        return $user;
    }

}