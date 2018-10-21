<?php

namespace btlc;


use btlc\libs\Debug;

class App {

    /**
     * @var TSingletone
     * хранится объект класса Registry для работы с массивом параметров
     */
    public static $app;

    /**
     * App constructor.
     * @throws \Exception
     */
    public function __construct() {
        $query = trim($_SERVER['QUERY_STRING'], '/');
        session_start();
        self::$app = Registry::instance();
        self::$app->loadProperties(CONF.'/params.php');
        new ErrorHandler();
        Router::dispatch($query);
    }

    /**
     *todo аналог функции Registry::loadProperties УДАЛИТЬ В БУДУЩЕМ
     */
    protected function getParams() {
        $params = require_once CONF. '/params.php';
        if(!empty($params)) {
            foreach($params as $k => $v) {
                self::$app->setProperty($k, $v);
            }
        }
    }
}