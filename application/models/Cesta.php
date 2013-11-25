<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cesta
 *
 * @author Cristian
 */
class Cesta extends DataMapper {

    var $table = 'cesta';

    public function __construct($id = NULL) {
        parent::__construct($id);
    }

    public function todos_los_items($cliente_id) {
        $sql = "select rel2.itemcestaID,l.titulo,l.autor,l.id as libroID,l.precio as precioLibro,rel2.cantidad as cantidadLibros,rel2.id as cestaID from libro as l join 
                (
                    select ic.id as itemcestaID,ic.CantidadUnidades as cantidad,ic.LibroID,rel.id from 
                    itemcesta as ic join 
                    (
                        select c.id from cesta as c join cliente as cl on c.ClienteID = cl.id where cl.id = ".$cliente_id."
                    ) 
                    as rel on ic.CestaID = rel.id
                ) 
                as rel2 on l.id = rel2.LibroID";
        $query = $this->db->query($sql);
        return $query->result();
        
    }

}
