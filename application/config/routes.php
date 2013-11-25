<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//$route['nivekpetero/selacome'] = "home";

//$route[':any'] = 'home';

$route['cliente/registro']="cliente_controller/registro";
$route['cliente/showLogin']="cliente_controller/showLogin";
$route['cliente/login']="cliente_controller/login";
$route['cliente/registrar']="cliente_controller/registrar";
$route['cliente/logout']="cliente_controller/logout";

$route['carrito']="carrito_controller";
$route['carrito/agregar']="carrito_controller/agregar";
$route['carrito/borrarElemento/(:num)']="carrito_controller/borrarElemento/$1";
$route['carrito/actualizarElemento']="carrito_controller/actualizarElemento";

$route['catalogo']="catalogo_controller";
$route['catalogo/pagina/(:num)']='catalogo_controller';
$route['catalogo/pagina']='catalogo_controller';
$route['catalogo/detalles/(:num)']='catalogo_controller/detalles/$1';
$route['catalogo/do_search']='catalogo_controller/do_search';
$route['catalogo/buscar/(:any)']='catalogo_controller/buscar/$1';
$route['catalogo/buscar']='catalogo_controller';



$route['admin/catalogo/']='admin/login';
$route['admin/catalogo/index']='admin/catalogo/index';
$route['admin/catalogo/do_buscar']='admin/catalogo/do_buscar';
$route['admin/cliente/do_buscar']='admin/cliente/do_buscar';
$route['admin/catalogo/buscar/(:any)']='admin/catalogo/buscar/$1';
$route['admin/cliente/buscar/(:any)']='admin/cliente/buscar/$1';
$route['admin/catalogo/modificar']='admin/catalogo/modificar';
$route['admin/cliente/modificar']='admin/cliente/modificar';
$route['admin/catalogo/modificar/(:any)']='admin/catalogo/modificar/$1';
$route['admin/cliente/modificar/(:any)']='admin/cliente/modificar/$1';
$route['admin/catalogo/eliminar/(:any)']='admin/catalogo/eliminar/$1';
$route['admin/cliente/eliminar/(:any)']='admin/cliente/eliminar/$1';
$route['admin/cliente/interruptor/(:any)']='admin/cliente/interruptor/$1';
$route['admin/cliente/(:any)']='admin/cliente/index/$1';

$route['admin/categoria/eliminar/(:any)']='admin/categoria/eliminar/$1';
$route['admin/catalogo/(:any)']='admin/catalogo/index/$1';
$route['default_controller'] = "home";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
