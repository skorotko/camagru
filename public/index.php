<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

use vendor\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW',  __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/core');
define('ROOT', dirname(__DIR__));
define('APP', dirname(__DIR__) . '/application');
define('LAYOUT', 'default');

require '../vendor/libs/funct.php';

spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$',['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$',['controller' => 'Page', 'action' => 'view']);
Router::add('^authorization/access/.+?$', ['controller' => 'Authorization', 'action' => 'access']);

Router::add('^$',['controller' => 'Authorization', 'action' => 'registration']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
