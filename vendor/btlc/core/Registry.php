<?php

namespace btlc;

/**
 * Class Registry
 * @package btlc
 * регистрирует в системе массивы параметров
 */
class Registry {

    use TSingletone;

    /**
     * @var array
     * содержит массив параметров, зарегистрированных методом setProperty
     */
    public static $properties = [];

    /**
     * @param $name
     * @param $value
     * добавляет в self::propetries значение с ключом
     */
    public function setProperty($name, $value) {
        self::$properties[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     * возвращает параметр по имени
     */
    public function getProperty($name) {
        if(isset(self::$properties[$name])) {
            return self::$properties[$name];
        }
        return null;
    }

    /**
     * @return array
     * возвращает массив всех параметров
     */
    public function getProperties() {
        return self::$properties;
    }

    /**
     * @param $path
     * загружает массив параметров из файла, представляющего вид ассоциативного массива
     */
    //todo exception на отсутствие файла конфигурации
    public function loadProperties ($path) {
        $params = require_once $path;
        if(!empty($params)) {
            foreach($params as $k => $v) {
                $this->setProperty($k, $v);
            }
        }
    }
}