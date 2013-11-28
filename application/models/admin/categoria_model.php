<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categoria_model
 *
 * @author Sadhu
 */
class Categoria_model extends CI_Controller{
    //put your code here
    public function __construct() {
        parent::__construct();
         $this->load->database();
    }

    public function get_categorias($cad = NULL, $pag = 0) {
        if ($cad == NULL) {
            $this->db->limit(POR_PAGINA,$pag);
            $sql = $this->db->get('categoria')->result();
        } else {
            $this->db->limit(POR_PAGINA,$pag);
            $this->db->like('Nombre', $cad);
            $sql = $this->db->get('categoria')->result();
        }
        return $sql;
    }

    public function get_total($cad = NULL) {
        if ($cad == NULL){
            $sql = $this->db->get('categoria')->num_rows();
        }else{
            $this->db->like('Nombre', $cad);
            $sql = $this->db->get('categoria')->num_rows();
        }
        return $sql;
    }


    public function eliminar($id){
        $sql="DELETE FROM categoria WHERE id=$id";
        return $this->db->query($sql);
        
    }
        public function actualizar($id,$nombre) {
        $data = array(
            'Nombre' => $nombre
        );
        $this->db->where('id', $id);
        $this->db->update('categoria', $data);
    }

    public function insertar($nombre) {
        $data = array(
            'Nombre' => $nombre
        );
        $this->db->insert('categoria', $data);
    }

    public function get($id) {
        $sql = $this->db->get_where('categoria', array('id' => $id))->row();
        return $sql;
    }
}

?>
