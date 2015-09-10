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


$route['article_details/(:num)'] = 'pages/article_details/$1';

$route["change_user_type"]='pages/change_user_type';
$route["commentmanage"]='pages/commentmanage';
$route["upload_article"]='pages/upload_article';
$route["articlemnabage"]='pages/articlemnabage';
$route["create_class"]='pages/create_class';
$route["events"]='pages/events';
$route["contact"]='pages/contact';
$route["about"]='pages/about';
$route["gallery"]='pages/gallery';
$route["front"]='pages/front';
$route["upload_article"]='pages/upload_article';
$route["usermanage"] = 'pages/usermanage'; 
$route["userregistration"] = 'register'; 
$route["register_success"] = 'pages/register_success'; 
$route["main"] = 'pages/main'; 
$route["register"] = 'pages/register_user'; 
$route["checkLogin"] = 'pages/checkLogin';
$route["login"] = 'pages/login';
$route['default_controller'] = 'pages/front'; //Our default Controller
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */