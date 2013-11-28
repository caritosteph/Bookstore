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

    public function get_usuarios($cad = NULL, $pag = 0) {
        if ($cad == NULL) {
            $this->db->limit(POR_PAGINA,$pag);
            $sql = $this->db->get('cuenta')->result();
        } else {
            $this->db->limit(POR_PAGINA,$pag);
            $this->db->like('Nombre', $cad);
            $this->db->or_like('Email', $cad);
            $sql = $this->db->get('cuenta')->result();

        }
        return $sql;
    }

    public function get_total($cad = NULL) {
        if ($cad == NULL){
            $sql = $this->db->get('cuenta')->num_rows();
        }else{
            $this->db->like('Nombre', $cad);
            $this->db->or_like('Email', $cad);
            $sql = $this->db->get('cuenta')->num_rows();
        }
        return $sql;
    }

    public function eliminar($id) {
        $this->db->delete('cuenta', array('id' => $id));
    }

    public function actualizar($id, $nombre, $email, $contrasena) {
        $data = array(
            'Nombre' => $nombre,
            'Email' => $email,
            'Contrasena' => $contrasena
        );
        $this->db->where('id', $id);
        $this->db->update('cuenta', $data);
    }

    public function insertar($nombre, $email, $contrasena) {
        $data = array(
            'Nombre' => $nombre,
            'Email' => $email,
            'Contrasena' => crypt($contrasena, 'hola')
        );
        $this->db->insert('cuenta', $data);
    }

    public function get($id) {
        $sql = $this->db->get_where('cuenta', array('id' => $id))->row();
        return $sql;
    }

}

