<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//$route['urlpath'] = 'controller/method';
$route['default_controller'] = 'Shoping_cart/index';
//if put only auth in url that redirect to login page
$route['auth'] = 'auth/login';
$route['posts/create'] = 'posts/create';
$route['product/create'] = 'product/create';
$route['posts/update'] = 'posts/update';
$route['product/(:any)'] = 'product/view/$1';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = 'posts/index';


$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['loginauth'] = 'auth/loginauth';

// $route['http://localhost/ci_shop/'] = show_404();


$route['products'] = 'products/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


