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

/*---- 佈告欄  ----*/
$route['content/notice'] = 'content/manage_notice/notice';
$route['content/notice_add'] = 'content/manage_notice/notice_add';
$route['content/notice_mdy'] = 'content/manage_notice/notice_mdy';
$route['content/notice_class'] = 'content/manage_notice/notice_class';
$route['content/notice_class_add'] = 'content/manage_notice/notice_class_add';
$route['content/notice_class_mdy'] = 'content/manage_notice/notice_class_mdy';

/*---- 選單維護  ----*/
$route['maintain_menu/default'] = 'content/maintain_menu/index';
$route['maintain_menu/load_function/(:num)'] = 'content/maintain_menu/load_function/$1';
$route['maintain_menu/load_folder/(:num)'] = 'content/maintain_menu/load_folder/$1';
$route['maintain_menu/modify_folder'] = 'content/maintain_menu/modify_folder';
$route['maintain_menu/modify_function'] = 'content/maintain_menu/modify_function';
$route['maintain_menu/add_folder'] = 'content/maintain_menu/add_folder';
$route['maintain_menu/add_function'] = 'content/maintain_menu/add_function';
$route['maintain_menu/del_folder'] = 'content/maintain_menu/del_folder';
$route['maintain_menu/del_function'] = 'content/maintain_menu/del_function';

/*---- 個人資料修改  ----*/
$route['content/employee_mdy'] = 'content/employee_mdy/index';
$route['content/employee_mdy_password'] = 'content/employee_mdy/mdy_password';

/*---- 選單權限設定  ----*/
$route['authority_menu/index'] = 'content/authority_menu/index';
$route['authority_menu/all_unit'] = 'content/authority_menu/get_unit';
$route['authority_menu/authority/(:any)'] = 'content/authority_menu/authority_setting/$1';
$route['authority_menu/save'] = 'content/authority_menu/authority_save';

/*---- 員工帳號維護功能  ----*/
$route['content/member_mdy'] = 'content/member_mdy/member_class';
$route['content/member_password_mdy/(:any)'] = 'content/member_mdy/member_password_mdy/$1';
$route['content/member_all_mdy/(:any)'] = 'content/member_mdy/member_all_mdy/$1';
$route['content/member_password_save'] = 'content/member_mdy/member_password_save';
$route['content/member_all_save'] = 'content/member_mdy/member_all_save';
$route['content/member_search'] = 'content/member_mdy/member_search';
$route['content/member_add'] = 'content/member_mdy/member_add';
$route['content/member_add_save'] = 'content/member_mdy/member_add_save';

/*---- 訊息維護  ----*/
$route['message/index'] = 'public_program/message/index';
$route['message/add'] = 'public_program/message/add';

/*---- 共用分類  ----*/
$route['classes/index'] = 'public_program/classes/index';
$route['classes/add'] = 'public_program/classes/add';
$route['classes/add_save'] = 'public_program/classes/add_save';
$route['classes/mdy'] = 'public_program/classes/modify';
$route['classes/mdy_save'] = 'public_program/classes/modify_save';
$route['classes/del'] = 'public_program/classes/delete';


/*---- WebLog  ----*/
$route['weblog/index'] = 'content/weblog/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
