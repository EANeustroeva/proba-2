<?php

use fw\core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define("DEBUG", 1); //isset($_GET['debug'])
define('WWW', __DIR__);
define('CORE', dirname(__DIR__) . '/vendor/fw/core');
define('ROOT', dirname(__DIR__));
define('LIBS', dirname(__DIR__) . '/vendor/fw/libs');
define('APP', dirname(__DIR__) . '/app');
define('CACHE', dirname(__DIR__) . '/tmp/cache');
define('BASE_URL', str_replace('\\','/',str_replace("public", '',dirname($_SERVER["SCRIPT_NAME"]))));
define('BASE_PATH', str_replace('\\','/',realpath('.')).'/');
setlocale(LC_TIME, 'ru_RU.UTF-8');
define('LAYOUT', 'blog');
define('ADMIN', '/admin');

require '../vendor/fw/libs/functions.php';
require __DIR__ . '/../vendor/autoload.php';

/*spl_autoload_register(function($class){
    $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_file($file)){
        require_once $file;
    }
});*/


new \fw\core\App;

//Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
//Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// defaults routs
//Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
//Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

//Router::add('^(?P<action>[1-9a-z-]+)$', ['controller' => 'Main']);
Router::add('^profile$', ['controller' => 'Main', 'action' => 'profile']);
Router::add('^page$', ['controller' => 'Main', 'action' => 'page']);
Router::add('^page2$', ['controller' => 'Main', 'action' => 'page2']);
Router::add('^page3$', ['controller' => 'Main', 'action' => 'page3']);
Router::add('^page4$', ['controller' => 'Main', 'action' => 'page4']);
Router::add('^page5$', ['controller' => 'Main', 'action' => 'page5']);
Router::add('^page6$', ['controller' => 'Main', 'action' => 'page6']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);

Router::dispatch($query);