<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('check')) {

    function check() {

        if (!isset($_SESSION['cliente'])) {

            $link = mysqli_connect("localhost", "root", "", "tienda_virtual");
            
            
            if (isset($_COOKIE['id_user']) && isset($_COOKIE['marca'])) {
                if ($_COOKIE['id_user'] != "" || $_COOKIE ['marca'] != "") {
                    $sql_c = mysqli_query($link,"SELECT * FROM cliente
					WHERE id='" . $_COOKIE["id_user"] . "' 
					AND cookie='" . $_COOKIE["marca"] . "'
					AND cookie<>'';");
                }
                if (mysqli_num_rows($sql_c)) {
                    $row_c = mysqli_fetch_array($sql_c);
                    $array_sesion = array(
                        'id' => $row_c['id'],
                        'nombre' => $row_c['Nombre']
                    );
                    $_SESSION['cliente'] = $array_sesion;
                    
                }
            }
        }
    }

}        