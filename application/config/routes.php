<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['posts/index'] = (isset($_SESSION['user_id'])) ? 'posts/index' : 'posts/user_posts/$_SESSION["user_id"]';
$route['posts/create'] = 'posts/create';
$route['posts/update'] = 'posts/update';
$route['posts/(:any)'] = 'posts/view/$1';
$route['posts'] = (isset($_SESSION['user_id'])) ? 'posts/index' : 'posts/user_posts/$_SESSION["user_id"]';

$route['default_controller'] = 'pages/view';

$route['categories'] = 'categories/index';
$route['categories/create'] = 'categories/create';
$route['categories/posts/(:any)'] = 'categories/posts/$1';

$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
