<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\Debug;
use RedBeanPHP\R;

class CountriesController extends AppController {

    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Countries', 'Страны', 'Сайт, бтлц');
        $countries = R::findAll('countries', 'WHERE visiable = 1');
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
            $country = R::load('countries', $_GET['id']);
            $country->visiable = 0;
            R::store($country);
            $_SESSION['message'] = "Страна {$country->country} удалена";
            header('Location: /countries');
            exit;
        }
    }

    /**
     * @throws \Exception
     */
    public function correctAction(){
        if(isset($_POST['submit'])){
            if(!empty($_POST['country'])) {
                $countries = R::load('countries', $_POST['id']);
                $countries->country = $_POST['country'];
                $countries->note = $_POST['note'];
                R::store($countries);
                $_SESSION['message'] = "Страна {$_POST['country']} откорректирована";
                header('Location: /countries');
                exit;
            }else{
                $_SESSION['message'] = "поле страна не может быть пустым";
                $_SESSION['post'] = $_POST;
                header('Location: /countries/correct/?id='.$_POST['id']);
                exit;
            }
        }

        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $countries = R::load('countries', $_GET['id']);
            if($countries->getID() == 0){
                throw new \Exception('нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
        $this->set(compact('countries'));
    }

}