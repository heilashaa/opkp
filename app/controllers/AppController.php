<?php

namespace app\controllers;

use app\models\AppModel;
use btlc\App;
use btlc\base\Controller;
use btlc\Cache;
use btlc\libs\Debug;
use RedBeanPHP\R;

class AppController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        new AppModel();//todo при добавлении, проверять наличие записей в invisible
        App::$app->setProperty('menu', self::cacheMenu());
        Debug::arr(App::$app->getProperties());
    }

    /**
     * @return array|bool формирует кэш меню
     */
    public static function cacheMenu(){
        $menu = Cache::get('menu_cache');
        if(!$menu){
            $menu = R::getAssoc("SELECT * FROM menu");
            Cache::set('menu_cache', $menu);
        }
        return $menu;
    }

}