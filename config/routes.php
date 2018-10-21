<?php

use btlc\Router;//todo перенести в класс Router и оставить только массивы

//все пользовательские правила, более конкретные правила должны находиться выше default

//////////////////
//default routes//
//////////////////

//совпадение с пустой строкой для admin
Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
//поиск совпадений и передача совпадений в массив со строковыми ключами массива controller и action для admin
Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

//совпадение с пустой строкой
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
//поиск совпадений и передача совпадений в массив со строковыми ключами массива controller и action
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');



