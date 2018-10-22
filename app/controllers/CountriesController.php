<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\Debug;
use RedBeanPHP\R;

class CountriesController extends AppController {

    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Countries', 'Страны', 'Сайт, бтлц');
        $countries = R::findAll('countries');
        $this->set(compact('countries'));
    }

    public function addAction(){
        if($_POST['submit'] && $_POST['country']){
            $countries = R::dispense('countries');
            $countries->country = $_POST['country'];
            $countries->note = $_POST['note'];
            $id = R::store($countries);
            header('Location: /countries');
            exit;

        }else{
            echo 'заполните все поля';
            $_SESSION['post'] = $_POST;
            header('Location: /countries');
            exit;
        }
    }

    public function deleteAction(){
        if($_GET['id'] && is_numeric($_GET['id'])){
            $country = R::findOne('countries', 'id=?', [$_GET['id']]);
            R::trash('countries', $_GET['id']);
            $_SESSION['message'] = "Страна {$country->country} удалена";
            header('Location: /countries');
            exit;
        }
    }

    public function correctAction(){

    }

}