<?php

namespace app\controllers;

use btlc\App;
use RedBeanPHP\R;

class PositionsController extends AppController {

    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Positions', 'Должности', 'Сайт, бтлц');
        $positions = R::findAll('positions', 'WHERE visiable = 1');
        $this->set(compact('positions'));
    }

    public function addAction(){
        if($_POST['submit'] && $_POST['position']){
            $positions = R::dispense('positions');
            $positions->position = $_POST['position'];
            $id = R::store($positions);
            header('Location: /positions');
            exit;

        }else{
            $_SESSION['post'] = $_POST;
            $_SESSION['message'] = 'заполните все поля';
            header('Location: /positions');
            exit;
        }
    }

    public function deleteAction(){
        if($_GET['id'] && is_numeric($_GET['id'])){
            $position = R::load('positions', $_GET['id']);
            $position->visiable = 0;
            R::store($position);
            $_SESSION['message'] = "Должность {$position->position} удалена";
            header('Location: /positions');
            exit;
        }
    }
//todo закончено сдесь. пересматривать дальше вниз
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
            $departments = R::load('departments', $_GET['id']);
            if($departments->getID() == 0){
                throw new \Exception('нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
        $this->set(compact('departments'));
    }

}