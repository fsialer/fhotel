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
$route['default_controller'] = 'Front';
$route['reservation'] = 'Front/reservation';
$route['available'] = 'Reservation/available';
$route['shopping_cart'] = 'Front/shopping_cart';
$route['auth'] = 'User/auth';
$route['register'] = 'User/register';
$route['delete_tr'] = 'Front/delete_tr';
$route['admin/amenities'] = 'Amenity';
$route['admin/amenities/(:num)'] = 'Amenity/index/$1';
$route['admin/amenities/search'] = 'Amenity/search';
$route['admin/amenities/show'] = 'Amenity/show';
$route['admin/amenities/show_by'] = 'Amenity/show_by';
$route['admin/amenities/create'] = 'Amenity/create';
$route['admin/amenities/edit/(:num)'] = 'Amenity/edit/$1';
$route['admin/amenities/delete/(:num)']='Amenity/delete/$1';
$route['admin/typesrooms'] = 'Type_room';
$route['admin/typesrooms/(:num)'] = 'Type_room/index/$1';
$route['admin/typesrooms/search'] = 'Type_room/search';
$route['admin/typesrooms/show'] = 'Type_room/show';
$route['admin/typesrooms/show_by'] = 'Type_room/show_by';
$route['admin/typesrooms/create'] = 'Type_room/create';
$route['admin/typesrooms/edit/(:num)'] = 'Type_room/edit/$1';
$route['admin/typesrooms/delete/(:num)']='Type_room/delete/$1';
$route['admin/rooms'] = 'Room';
$route['admin/rooms/(:num)'] = 'Room/index/$1';
$route['admin/rooms/search'] = 'Room/search';
$route['admin/rooms/show'] = 'Room/show';
$route['admin/rooms/show_by'] = 'Room/show_by';
$route['admin/rooms/create'] = 'Room/create';
$route['admin/rooms/edit/(:num)'] = 'Room/edit/$1';
$route['admin/rooms/delete/(:num)']='Room/delete/$1';
$route['admin/reservations'] = 'Reservation';
$route['admin/reservations/(:num)'] = 'Reservation/index/$1';
$route['admin/reservations/search'] = 'Reservation/search';
$route['admin/reservations/show'] = 'Reservation/show';
$route['admin/reservations/show_by'] = 'Type_room/show_by';
$route['admin/vouchers/create/(:num)'] = 'Voucher/create/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
