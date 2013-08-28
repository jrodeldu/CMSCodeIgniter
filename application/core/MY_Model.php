<?php

class MY_Model extends CI_Model {

    protected $_table_name      = '';
    protected $_primary_key     = 'id';
    protected $_primary_filter  = 'intval'; // Obtiene el valor entero de una variable
    protected $_order_by        = '';
    public    $rules            = array();
    protected $_timestamps      = FALSE;

    public function __construct(){
        parent::__construct();
    }

    /**
     * Devolverá todos los registro o el registro
     * correspondiente al id pasado
     * @param null $id
     */
    public function get($id = NULL, $single =  FALSE) {

        if($id != NULL){
            $filter = $this->_primary_filter;
            $id = $filter($id); // Obtiene el valor entero de $id
            $this->db->where($this->_primary_key, $id);
            $method = 'row'; // Establecemos método para devolver sólo el registro del id
        }elseif($single == TRUE){
            $method = 'row'; // Establecemos método para devolver sólo el registro del id
        }else{
            $method = 'result'; // Establecemos método para devolver todos los registros.
        }

        // Si no se ha establecido antes un orden se ordena por defecto.
        if(count($this->db->ar_orderby)){
            $this->db->order_by($this->_order_by);
        }

        return $this->db->get($this->_table_name)->$method();
    }

    /**
     * Función de búsqueda de registro/s con where
     * la variable single permite definir por ej si
     * buscamos por email y sólo queremos 1 registro
     * de ese email en lugar de varios (en caso de haberlos)
     * @param $where
     * @param bool $single
     * @return mixed
     */
    public function get_by($where, $single = FALSE){
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    /**
     * Guardar registro nuevo o actualizar uno
     * existente mediante el parámetro id
     * @param $data
     * @param null $id
     */
    public function save($data, $id = NULL){
        // Establecer timestamps
        if($this->_timestamps == TRUE){
            $now = date('Y-m-d H:i:s');
            // Asumimos que tenemos un id y si no lo hay se establece el created igual $now también
            $id || $data['created'] = $now;
            $data['modified']  = $now; // Modificación del registro
        }

        // Insert
        if($id === NULL){
            // Asumimos que el id no está establecido y si lo está se establece a NULL.
            !isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            $id = $this->db->insert_id();
        }
        // Update
        else{
            $filter = $this->_primary_filter;
            $id = $filter($id); // Obtiene el valor entero de $id
            $this->db->set($data);
            $this->db->where($this->_primary_key, $id);
            $this->db->update($this->_table_name);
        }

        return $id;
    }

    /**
     * Borrar elemento por id.
     * @param $id
     * @return bool
     */
    public function delete($id){
        $filter = $this->_primary_filter;
        $id = $filter($id); // Obtiene el valor entero de $id

        if(!$id){
            return FALSE;
        }
        $this->db->where($this->_primary_key, $id);
        $this->db->limit(1);
        $this->db->delete($this->_table_name);
    }
}