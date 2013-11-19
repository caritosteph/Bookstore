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
class Cliente_Model extends DataMapper{
    var $table = 'cliente';
    public function __construct($id = NULL) {
        parent::__construct($id);
    }
}
