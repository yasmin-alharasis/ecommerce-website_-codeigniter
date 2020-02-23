<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['urlpath'] = 'controller/method';

$route['default_controller'] = 'welcome/view';
//if put only auth in url that redirect to login page
$route['auth'] = 'auth/login';
$route['posts/create'] = 'posts/create';
$route['product/create'] = 'product/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';

$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['loginauth'] = 'auth/loginauth';

//$route['http://localhost/codeigniter_crud_system/'] = show_404();
$route['products'] = 'products/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// $route['default_controller'] = 'pages/view';
// $route['(:any)'] = 'pages/view/$1';