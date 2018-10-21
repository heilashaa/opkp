<?php

namespace btlc;

use btlc\libs\Debug;

class Db {

    use TSingletone;

    protected function __construct() {
        $db = require_once CONF. '/config_db.php';
        class_alias('\RedBeanPHP\R', '\R');
        \R::setup($db['dsn'], $db['user'], $db['pass']);
        if(!\R::testConnection()){
            throw new \Exception("Нет соединения с базой данных", 500);
        }
        \R::freeze(TRUE);//запретить изменять структуру таблиц и полей
        if(DEBUG){
            \R::debug(TRUE, 1);//lesson 12 time 13:00
        }
    }

}