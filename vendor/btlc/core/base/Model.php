<?php

namespace btlc\base;


use btlc\Db;

abstract class Model {

    public $attributes = [];//массив свойств модели, идентичных полям таблицы БД
    public $errors = [];
    public $rules = [];

    public function __construct() {
        Db::instance();
    }

}