<?php 
// site name
define('SITE_NAME', 'accommodation-management');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// App root
define('APP_ROOT', dirname(dirname(__FILE__)));
define('URL_SUBFOLDER', 'ams');
define('URL_ROOT', '/' . URL_SUBFOLDER . '/views');

// DB config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'ams');
