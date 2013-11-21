<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario_Model
 *
 * @author Carito
 */
class Usuario_model extends CI_Model {

    public function __construct($id = NULL) {
        parent::__construct($id);
    }

    public function get_usuarios() {
//        $this->db->limit($pagination,$segment);
        $sql = $this->db->get('cuenta')->result();
        return $sql;
    }

    public function eliminar($id) {
        $this->db->delete('cuenta', array('id' => $id));
    }

    public function actualizar($id, $usuario, $contrasena) {
        $data = array(
            'Usuario' => $usuario,
            'Contrasena' => $contrasena
        );
        $this->db->where('id', $id);
        $this->db->update('cuenta', $data);
    }

    public function insertar($usuario, $contrasena) {
        $data = array(
            'Usuario' => $usuario,
            'Contrasena' => $contrasena
        );
        $this->db->insert('cuenta', $data);
    }

    public function get_usuarios_cantidad() {
        return $this->db->get('cuenta')->num_rows();
    }


}

