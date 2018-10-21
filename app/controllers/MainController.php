<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\Debug;
use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction() {
        $posts = R::findAll('testtable');
        Debug::arr($posts);
        $this->setMeta(App::$app->getProperty('site_name'), 'Главная', 'Сайт, бтлц');

        $name = 'Vasia';
        $age = 25;

        $this->set(compact('name', 'age', 'posts'));

    }
}