<?php

// BasePath untuk web, bisa diubah
define('BASEPATH', 'http://localhost/native-mvc/');

// Default controller
define('DEFAULT_CONTROLLER', 'Home');

// Default method
define('DEFAULT_METHOD', 'index');

// Configuration for database connection
$GLOBALS['MYSQL_DATABASE'] = [
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => 'root',
    'database' => 'native-mvc'
];
