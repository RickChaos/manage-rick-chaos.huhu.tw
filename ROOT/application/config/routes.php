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
|	http://codeigniter.com/user_guide/general/routing.html
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

/*---- 測試區  ----*/
$route['testdb/index'] = 'test_folder/testdb/index';  /*左方為Client路徑 : 右方為Server路徑*/
$route['testdb/hashpassword/(:any)'] = 'test_folder/testdb/hashpassword/$1';  //測試hash password 函數

/*---- 登入  ----*/
$route['default_controller'] = 'login/index'; //登入頁面
$route['login/check'] = 'login/check_user';
$route['login/logout'] = 'login/logout';
$route['login/fail/(:any)'] = 'login/validate_fail/$1';

/* manage_template route */
$route['manage_template/index'] = 'manage_template/manage_template/index';
$route['manage_template/template_left'] = 'manage_template/manage_template/left';
$route['manage_template/template_top'] = 'manage_template/manage_template/top';
$route['manage_template/default_content'] = 'manage_template/manage_template/default_content';
$route['manage_template/notice_add'] = 'manage_template/manage_notice/notice_add';
$route['manage_template/notice'] = 'manage_template/manage_notice/notice';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
