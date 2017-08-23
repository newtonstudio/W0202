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

$route['fbcallback'] = "login_manage/fbcallback";
$route['fblogin'] = "login_manage/fblogin";
$route['login'] = "login_manage/login";
$route['api/googleLogin'] = "api_manage/googleLogin";
$route['testmachine'] = "api_manage/testmachine";
$route['testToken'] = "api_manage/testToken";
$route['api/postNews'] = "api_manage/postNews";
$route['api/getNewsList'] = "api_manage/getNewsList";
$route['api/getNewsList/(:any)'] = "api_manage/getNewsList/$1";

$route['newslist'] = 'contact_manage/newslist';



$route['manage'] = 'contact_manage/manage';
$route['manage/(:num)'] = 'contact_manage/manage/$1';
$route['contact'] = 'contact_manage/index';
$route['edit/(:num)'] = 'contact_manage/index/$1/E';
$route['copy/(:num)'] = 'contact_manage/index/$1/C';
$route['delete/(:num)'] = 'contact_manage/delete/$1';

$route['contact_submit'] = 'contact_manage/submit';
$route['news'] = 'news_manage/index';
$route['news_detail/(:num)/(:any)'] = 'news_manage/news_detail/$1/$2';

$route['about'] = 'news_manage/about';

$route['report'] = 'report_manage/index';
$route['falseData'] = "report_manage/falseData";

$route['test_add'] = 'contact_manage/test_add';
$route['test_get'] = 'contact_manage/test_get';
$route['test_update'] = 'contact_manage/test_update';
$route['test_delete'] = 'contact_manage/test_delete';
$route['testmail']    = 'contact_manage/testmail';
$route['default_controller'] = 'welcome/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
