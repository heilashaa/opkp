<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\Debug;
use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction() {

        $clientsRequests = R::findAll('clients_requests');
        Debug::arr($clientsRequests);
        $this->setMeta(App::$app->getProperty('site_name'). 'Main', 'Главная', 'Сайт, бтлц');
        $this->set(compact('clientsRequests'));

    }
}