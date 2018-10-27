<?php

namespace app\controllers;

use btlc\App;
use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction() {

        $clientsRequests = R::findAll('clients_requests');
        $this->setMeta(App::$app->getProperty('site_name'). 'Main', 'Главная', 'Сайт, бтлц');
        $this->set(compact('clientsRequests'));

    }
}