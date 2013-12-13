<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Cristian
 */
class Cliente extends DataMapper {

    var $table = 'cliente';
    public $has_one = array(
        'carrito_Model' => array(
            'class' => 'Carrito_Model'
        )
    );

    public function __construct($id = NULL) {
        parent::__construct($id);
        $this->load->database();
    }

}
