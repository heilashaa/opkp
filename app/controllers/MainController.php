<?php

namespace app\controllers;

use btlc\App;
use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction() {
        $clients = R::findAll('clients');
        $this->setMeta(App::$app->getProperty('site_name'). 'Main', 'Главная', 'Сайт, бтлц');

        $name = 'Vasia';
        $age = 25;

        $this->set(compact('name', 'age', 'clients'));
    }
}