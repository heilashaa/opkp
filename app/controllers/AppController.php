<?php

namespace app\controllers;

use app\models\AppModel;
use btlc\App;
use btlc\base\Controller;
use btlc\Cache;
use RedBeanPHP\R;

class AppController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        new AppModel();//todo при добавлении, проверять наличие записей в invisible
        App::$app->setProperty('menu', self::cacheMenu());
    }

    /**
     * @return array|bool формирует кэш меню
     */
    public static function cacheMenu(){
        $menu = Cache::get('menu');
        if(!$menu){
            $menu = R::getAssoc("SELECT * FROM menu");
            Cache::set('menu', $menu);
        }
        return $menu;
    }

}