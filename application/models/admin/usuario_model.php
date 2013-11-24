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

    public function get_usuarios($cad = "") {
        $this->db->like('Nombre', $cad);
        $this->db->or_like('Email', $cad);
        $sql = $this->db->get('cuenta')->result();
        return $sql;
    }

    public function get_total($cad = NULL) {
        if ($cad == NULL)
            $sql = $this->db->get('cuenta')->num_rows();
        else
            $this->db->like('Nombre', $cad);
            $this->db->or_like('Email', $cad);
            $sql = $this->db->get('cuenta')->num_rows();
        return $sql;
    }

    public function eliminar($id) {
        $this->db->delete('cuenta', array('id' => $id));
    }

    public function actualizar($id) {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'Email' => $this->input->post('email'),
            'Contrasena' => $this->input->post('contrasena')
        );
        $this->db->where('id', $id);
        $this->db->update('cuenta', $data);
    }

    public function insertar() {
        $data = array(
            'Nombre' => $this->input->post('nombre'),
            'Email' => $this->input->post('email'),
            'Contrasena' => $this->input->post('contrasena')
        );
        print_r($data);
        $this->db->insert('cuenta', $data);
    }

    public function get($id) {
        $sql = $this->db->get_where('cuenta', array('id' => $id))->row();
        return $sql;
    }

}

