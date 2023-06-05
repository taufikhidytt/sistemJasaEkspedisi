<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/


// Route Home
$route['profileSingkat'] = 'home/profileSingkat';
$route['syarat'] = 'home/syarat';
// $route['resi'] = 'home/resi';


// Route Admin
$route['dashboard'] = 'admin/dashboard';
$route['hero'] = 'admin/hero';
$route['hero/update/(:any)'] = 'admin/hero/update/$1';
$route['superiority'] = 'admin/superiority';
$route['superiority/add'] = 'admin/superiority/add';
$route['superiority/del'] = 'admin/superiority/del';
$route['superiority/update/(:any)'] = 'admin/superiority/update/$1';
$route['contactDescription'] = 'admin/contactDescription';
$route['contactDescription/update/(:any)'] = 'admin/contactDescription/update/$1';
$route['contact'] = 'admin/contact';
$route['contact/add'] = 'admin/contact/add';
$route['contact/del'] = 'admin/contact/del';
$route['contact/update/(:any)'] = 'admin/contact/update/$1';
$route['about'] = 'admin/about';
$route['about/update/(:any)'] = 'admin/about/update/$1';
$route['visi'] = 'admin/visi';
$route['visi/update/(:any)'] = 'admin/visi/update/$1';
$route['misi'] = 'admin/misi';
$route['misi/update/(:any)'] = 'admin/misi/update/$1';
$route['kategoriBarang'] = 'admin/kategoriBarang';
$route['kategoriBarang/add'] = 'admin/kategoriBarang/add';
$route['kategoriBarang/update/(:any)'] = 'admin/kategoriBarang/update/$1';
$route['kategoriBarang/del'] = 'admin/kategoriBarang/del';
$route['termsAndConditions'] = 'admin/termsAndConditions';
$route['termsAndConditions/add'] = 'admin/termsAndConditions/add';
$route['termsAndConditions/update/(:any)'] = 'admin/termsAndConditions/update/$1';
$route['termsAndConditions/del'] = 'admin/termsAndConditions/del';
$route['barang'] = 'admin/barang';
$route['barang/add'] = 'admin/barang/add';
$route['barang/del'] = 'admin/barang/del';
$route['barang/update/(:any)'] = 'admin/barang/update/$1';
$route['users'] = 'admin/users';
$route['users/add'] = 'admin/users/add';
$route['users/del'] = 'admin/users/del';
$route['users/update/(:any)'] = 'admin/users/update/$1';
$route['auth'] = 'admin/auth';
$route['logout'] = 'admin/auth/logout';




$route['default_controller'] = 'home';
$route['404_override'] = 'admin/my404';
$route['assets'] = 'admin/my404';
$route['translate_uri_dashes'] = FALSE;
