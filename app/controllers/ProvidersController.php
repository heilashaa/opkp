<?php

namespace app\controllers;

use btlc\App;
use RedBeanPHP\R;

class ProvidersController extends AppController{
    public function indexAction(){

        $clientsRequests = R::findAll('clients_requests');
        $this->setMeta(App::$app->getProperty('site_name'). 'Providers', 'Поставщики услуг', 'Сайт, бтлц');
        $this->set(compact('clientsRequests'));

    }
}