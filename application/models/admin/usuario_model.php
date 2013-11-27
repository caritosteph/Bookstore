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

//    public function get_usuarios($cad = "") {
//        $this->db->like('Nombre', $cad);
//        $this->db->or_like('Email', $cad);
//        $value=3;
//        $offset=1;
//        $this->db->limit($value,$offset);
//        $sql = $this->db->get('cuenta')->result();
//        
//        return $sql;
//    }

    public function get_usuarios($cad = NULL, $pag = 1) {
        if ($cad == NULL) {
            $this->db->limit($pag,POR_PAGINA);
            $sql = $this->db->get('cuenta')->result();
        } else {
            $this->db->limit($pag,POR_PAGINA);
            $this->db->like('Nombre', $cad);
            $this->db->or_like('Email', $cad);
            $sql = $this->db->get('cuenta')->result();
        }
        return $sql;
    }

//    public function get_total($cad = NULL) {
//        if ($cad == NULL)
//            $sql = $this->db->get('cuenta')->num_rows();
//        else
//            $this->db->like('Nombre', $cad);
//        $this->db->or_like('Email', $cad);
//        $sql = $this->db->get('cuenta')->num_rows();
//        return $sql;
//    }

    public function get_total($cad = NULL) {
        if ($cad == NULL)
            $sql = $this->db->get('cuenta')->num_rows();
        else
            $this->db->like('Nombre', $cad);
            $this->db->or_like('Email', $cad);
            $sql = $this->db->get('cuenta')->num_rows();
        return $sql;
    }

    public function buscar($correo) {
        $sql = "SELECT * FROM cuenta WHERE Email='$correo'";
        $query = $this->db->query($sql);

        return $query->result();
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
            'Contrasena' => $contrasena
        );
        $this->db->insert('cuenta', $data);
    }

    public function get($id) {
        $sql = $this->db->get_where('cuenta', array('id' => $id))->row();
        return $sql;
    }

}

