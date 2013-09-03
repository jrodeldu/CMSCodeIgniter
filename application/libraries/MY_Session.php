<?php

class MY_Session extends CI_Session {

    // Override method
    function sess_update(){
        // Sólo se actualizan los datos de la sesion de CI mientras NO SEA UNA PETICION DE AJAX.
        if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest'){
            parent::sess_update();
        }
    }
}