<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
$route['service-details/(:any)'] = 'service/detail/$1';

$route['404_override'] = 'Error';
$route['translate_uri_dashes'] = FALSE;
