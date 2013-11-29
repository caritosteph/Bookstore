<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Itempedido
 *
 * @author Cristian
 */
class Itempedido extends DataMapper{
    var $table = "itempedido";
    public function __construct($id = NULL) {
        parent::__construct($id);
    }
}
