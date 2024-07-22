<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

ERROR - 2023-01-20 21:27:07 --> 404 Page Not Found: ControlPanel/klinik_org_save
ERROR - 2023-01-20 21:28:17 --> 404 Page Not Found: ControlPanel/klinik_org_save
ERROR - 2023-01-20 21:47:58 --> Severity: Notice --> Undefined index: ERROR:  C:\xampp\htdocs\v2\system\core\Log.php 180
ERROR - 2023-01-20 21:47:58 --> Severity: error --> Exception: Too few arguments to function ControlPanel::klinik_detail(), 0 passed in C:\xampp\htdocs\v2\system\core\CodeIgniter.php on line 532 and exactly 1 expected C:\xampp\htdocs\v2\application\controllers\ControlPanel.php 135
ERROR - 2023-01-20 21:51:44 --> Severity: Notice --> Undefined index: ERROR:  C:\xampp\htdocs\v2\system\core\Log.php 180
ERROR - 2023-01-20 21:56:22 --> Severity: Notice --> Undefined index: ERROR:  C:\xampp\htdocs\v2\system\core\Log.php 180
ERROR - 2023-01-20 21:57:31 --> Severity: Notice --> Undefined index: ERROR:  C:\xampp\htdocs\v2\system\core\Log.php 180
ERROR - 2023-01-20 22:00:35 --> Severity: Notice --> Undefined index: ERROR:  C:\xampp\htdocs\v2\system\core\Log.php 180
ERROR - 2023-01-20 22:02:55 --> Database error! Error Code [0] Error: 
ERROR - 2023-01-20 22:03:49 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\v2\application\models\Organization_model.php 40
ERROR - 2023-01-20 22:03:49 --> Database error! Array
ERROR - 2023-01-20 22:04:37 --> Database error! {"code":0,"message":""}
ERROR - 2023-01-20 22:07:30 --> Severity: Notice --> Undefined property: ControlPanel::$main_db C:\xampp\htdocs\v2\system\core\Model.php 77
ERROR - 2023-01-20 22:07:30 --> Severity: error --> Exception: Call to a member function last_query() on null C:\xampp\htdocs\v2\application\models\Organization_model.php 49
ERROR - 2023-01-20 22:08:02 --> Organization_model : map_to_klinik : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: UPDATE `organization` SET `organization_id` = '10083042', `client_id` = 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', `client_secret` = 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', `id_klinik` = '2', `is_main_org` = 1
WHERE `organization_id` = '10083042'
AND `id_klinik` = '2'
AND `is_main_org` = 1
ERROR - 2023-01-20 22:18:17 --> Severity: Notice --> Undefined index: organization_id C:\xampp\htdocs\v2\application\models\Organization_model.php 45
ERROR - 2023-01-20 22:18:17 --> Severity: Notice --> Undefined index: id_klinik C:\xampp\htdocs\v2\application\models\Organization_model.php 46
ERROR - 2023-01-20 22:18:17 --> Severity: Notice --> Undefined index: is_main_org C:\xampp\htdocs\v2\application\models\Organization_model.php 47
ERROR - 2023-01-20 22:18:17 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\v2\system\database\DB_driver.php 1525
ERROR - 2023-01-20 22:18:17 --> Query error: Unknown column 'org' in 'field list' - Invalid query: UPDATE `organization` SET `org` = Array
WHERE `organization_id` IS NULL
AND `id_klinik` IS NULL
AND `is_main_org` IS NULL
ERROR - 2023-01-20 22:19:48 --> Severity: Notice --> Array to string conversion C:\xampp\htdocs\v2\system\database\DB_driver.php 1477
ERROR - 2023-01-20 22:19:48 --> Query error: Unknown column 'Array' in 'field list' - Invalid query: INSERT INTO `organization` (`org`) VALUES (Array)
ERROR - 2023-01-20 22:20:15 --> Organization_model : insert : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: INSERT INTO `organization` (`organization_id`, `client_id`, `client_secret`, `id_klinik`, `is_main_org`) VALUES ('10083042', 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', '2', 1)
ERROR - 2023-01-20 22:26:10 --> Organization_model : insert : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: INSERT INTO `organization` (`organization_id`, `organization_type`, `client_id`, `client_secret`, `is_active`, `id_klinik`, `is_main_org`) VALUES ('10083042', '102', 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', 1, '2', 1)
ERROR - 2023-01-20 22:27:27 --> Organization_model : insert : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: INSERT INTO `organization` (`organization_id`, `organization_type`, `client_id`, `client_secret`, `is_active`, `id_klinik`, `is_main_org`) VALUES ('10083042', '102', 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', 1, '2', 1)
ERROR - 2023-01-20 22:33:52 --> Organization_model : update : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: UPDATE `organization` SET `organization_type` = '102', `client_id` = 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', `client_secret` = 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', `is_active` = 1
WHERE `organization_id` = '10083042'
AND `id_klinik` = '2'
AND `is_main_org` = 1
ERROR - 2023-01-20 22:41:39 --> Organization_model : update : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: UPDATE `organization` SET `organization_type` = '102', `client_id` = 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', `client_secret` = 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', `is_active` = 1
WHERE `organization_id` = '10083042'
AND `id_klinik` = '2'
AND `is_main_org` = 1
ERROR - 2023-01-20 22:43:14 --> Organization_model : replace : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: REPLACE INTO `organization` (`organization_id`, `organization_type`, `client_id`, `client_secret`, `is_active`, `id_klinik`, `is_main_org`) VALUES ('10083042', '102', 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', 1, '2', 1)
ERROR - 2023-01-20 22:44:40 --> Organization_model : replace : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: REPLACE INTO `organization` (`organization_id`, `organization_type`, `client_id`, `client_secret`, `is_active`, `id_klinik`, `is_main_org`) VALUES ('10083042', '102', 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', 1, '2', 1)
ERROR - 2023-01-20 22:45:43 --> Organization_model : replace : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: REPLACE INTO `organization` (`organization_id`, `organization_type`, `client_id`, `client_secret`, `is_active`, `id_klinik`, `is_main_org`) VALUES ('10083042', '102', 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', 1, '2', 1)
ERROR - 2023-01-20 22:46:32 --> Organization_model : replace : DB transaction failed. Error no: 0, Error msg:Database error! Error Code [0] Error: , Last query: REPLACE INTO `organization` (`organization_id`, `organization_type`, `client_id`, `client_secret`, `is_active`, `id_klinik`, `is_main_org`) VALUES ('10083042', '102', 'uKCKCZuFkkudD1225L8RHFtlH5y6RHQYGDaRjxJJBnE14sk8', 'LtQQVc7Cpp9iN1Rsz1cWz9YG60QV0VsaAALxOJFjHHjKfurflqhWHvdyq4bvc7XS', 1, '2', 1)
ERROR - 2023-01-20 22:55:12 --> Severity: error --> Exception: Too few arguments to function SatuSehatService::__construct(), 0 passed in C:\xampp\htdocs\v2\system\core\Loader.php on line 1279 and exactly 1 expected C:\xampp\htdocs\v2\application\libraries\SatuSehatService.php 23
ERROR - 2023-01-20 22:55:40 --> Severity: error --> Exception: Class 'SatuSehatService' not found C:\xampp\htdocs\v2\application\controllers\ControlPanel.php 234
ERROR - 2023-01-20 22:58:21 --> Severity: error --> Exception: Call to undefined method MY_Loader::get() C:\xampp\htdocs\v2\application\controllers\ControlPanel.php 235
ERROR - 2023-01-20 23:04:16 --> Severity: error --> Exception: Cannot use object of type stdClass as array C:\xampp\htdocs\v2\application\controllers\ControlPanel.php 234
ERROR - 2023-01-20 23:29:10 --> 404 Page Not Found: SatuSehat/org_$i
ERROR - 2023-01-20 23:29:44 --> 404 Page Not Found: SatuSehat/org_$i
ERROR - 2023-01-20 23:39:29 --> Severity: Notice --> Trying to get property 'client_id' of non-object C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 61
ERROR - 2023-01-20 23:39:29 --> Severity: Notice --> Trying to get property 'client_secret' of non-object C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 62
ERROR - 2023-01-20 23:39:29 --> Severity: Notice --> Undefined variable: organization_id C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 66
ERROR - 2023-01-20 23:40:02 --> Severity: Notice --> Trying to get property 'client_id' of non-object C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 62
ERROR - 2023-01-20 23:40:02 --> Severity: Notice --> Trying to get property 'client_secret' of non-object C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 63
ERROR - 2023-01-20 23:40:02 --> Severity: Notice --> Undefined variable: organization_id C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 67
ERROR - 2023-01-20 23:42:12 --> Severity: Notice --> Trying to get property 'organization_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 192
ERROR - 2023-01-20 23:42:12 --> Severity: Notice --> Trying to get property 'is_active' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 197
ERROR - 2023-01-20 23:42:12 --> Severity: Notice --> Trying to get property 'client_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 204
ERROR - 2023-01-20 23:42:12 --> Severity: Notice --> Trying to get property 'client_secret' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 209
ERROR - 2023-01-20 23:45:03 --> Severity: Notice --> Trying to get property 'organization_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 192
ERROR - 2023-01-20 23:45:03 --> Severity: Notice --> Trying to get property 'is_active' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 197
ERROR - 2023-01-20 23:45:03 --> Severity: Notice --> Trying to get property 'client_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 204
ERROR - 2023-01-20 23:45:03 --> Severity: Notice --> Trying to get property 'client_secret' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 209
ERROR - 2023-01-20 23:45:09 --> Severity: Notice --> Trying to get property 'organization_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 192
ERROR - 2023-01-20 23:45:09 --> Severity: Notice --> Trying to get property 'is_active' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 197
ERROR - 2023-01-20 23:45:09 --> Severity: Notice --> Trying to get property 'client_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 204
ERROR - 2023-01-20 23:45:09 --> Severity: Notice --> Trying to get property 'client_secret' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 209
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Undefined variable: org C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 192
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Trying to get property 'organization_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 192
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Undefined variable: org C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 197
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Trying to get property 'is_active' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 197
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Undefined variable: org C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 204
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Trying to get property 'client_id' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 204
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Undefined variable: org C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 209
ERROR - 2023-01-20 23:48:48 --> Severity: Notice --> Trying to get property 'client_secret' of non-object C:\xampp\htdocs\v2\application\views\control_panel\klinik_detail.php 209
ERROR - 2023-01-20 23:54:46 --> Severity: Notice --> Undefined variable: organization_id C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 68
ERROR - 2023-01-20 23:55:05 --> Severity: Notice --> Undefined variable: organization_id C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 68
ERROR - 2023-01-20 23:55:05 --> Severity: Notice --> Undefined property: stdClass::$ C:\xampp\htdocs\v2\application\controllers\SatuSehat.php 68
