<?php


define('ds',DIRECTORY_SEPARATOR);
define('APP_PATH',realpath(dirname(__FILE__)).ds.'..');
define('VIEWS_PATH',APP_PATH.ds.'views'.ds);
define('TEMPLATE_PATH',APP_PATH.ds.'template'.ds);
define('LANGUAG_PATH',APP_PATH.ds.'languages'.ds);
define('CSS','/css/');
define('JS','/js/');

defined('APP_SALT')     ? null : define ('APP_SALT', '$2a$07$yeNCSNwRpYopOhv0TrrReP$');
defined('DATABASE_HOST_NAME')       ? null : define ('DATABASE_HOST_NAME', 'localhost');
defined('DATABASE_USER_NAME')       ? null : define ('DATABASE_USER_NAME', 'root');
defined('DATABASE_PASSWORD')        ? null : define ('DATABASE_PASSWORD', '');
defined('DATABASE_DB_NAME')         ? null : define ('DATABASE_DB_NAME', 'storedb');
defined('DATABASE_PORT_NUMBER')     ? null : define ('DATABASE_PORT_NUMBER', 3306);
defined('DATABASE_CONN_DRIVER')     ? null : define ('DATABASE_CONN_DRIVER', 1);
defined('APP_DEFUALT_LANGUAGE')     ? null : define ('APP_DEFUALT_LANGUAGE','eng');
defined('CHECK_FOR_PRIVILIGES')     ? null : define ('CHECK_FOR_PRIVILIGES', 1);


defined('SESSION_NAME')     ? null : define ('SESSION_NAME','ESTORE_SESSION');
defined('SESSION_LIFE_TIME')     ? null : define ('SESSION_LIFE_TIME',0);
defined('SESSION_SAVE_PATH')     ? null : define ('SESSION_SAVE_PATH',APP_PATH.ds.'..'.ds.'session');


// define the path to our uploaded files
defined('UPLOAD_STORAGE')     ? null : define ('UPLOAD_STORAGE', APP_PATH . ds . '..' . ds.'public'.ds. 'upload');
defined('IMAGES_UPLOAD_STORAGE')     ? null : define ('IMAGES_UPLOAD_STORAGE', UPLOAD_STORAGE . ds . 'image');
defined('DOCUMENTS_UPLOAD_STORAGE')     ? null : define ('DOCUMENTS_UPLOAD_STORAGE', UPLOAD_STORAGE . ds . 'documentation');
defined('MAX_FILE_SIZE_ALLOWED')     ? null : define ('MAX_FILE_SIZE_ALLOWED', ini_get('upload_max_filesize'));


