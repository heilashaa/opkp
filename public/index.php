<?php

require_once __DIR__.'/../config/init.php';
require_once CONF. '/routes.php';

$app = new \btlc\App();

//\btlc\libs\Debug::arr(\btlc\App::$app->getProperties());
//throw new Exception('Страницы нет', 500);

//\btlc\libs\Debug::arr(\btlc\Router::getRoutes());



//require '../vendor/core/Router.php';
//require '../vendor/libs/functions.php';
//
//
//
////Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
////Router::add('posts', ['controller' => 'Posts', 'action' => 'index']);
////Router::add('', ['controller' => 'Main', 'action' => 'index']);
//
//Router::add('^$', ['controller' => 'Main', 'action' => 'index']);//для пустой строки
//Router::add('^(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)$');//в yii Router::add('<controller:[a-z-]+>/<action:[a-z-]+>');
//
//debug(Router::getRoutes());
//
//if(Router::matchRoute($query)) {
//    debug(Router::getRoute());
//}else{
//    echo '404';
//}