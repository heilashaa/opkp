<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\Debug;
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
            $_SESSION['message'] = "Должность {$_POST['position']} добавлена";
            header('Location: /positions');
            exit;

        }else{
            $_SESSION['post'] = $_POST;
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
//todo закончено сдесь. пересматривать дальше вниз. Добавить везде сессии
//todo оедирект функция 6 урок 2 часть 21 минута. виджит меню в 8 уроке
    /**
     * @throws \Exception
     */
    public function correctAction(){
        if(isset($_POST['submit'])){
            if(!empty($_POST['position'])) {
                $positions = R::load('positions', $_POST['id']);
                $positions->position = $_POST['position'];
                R::store($positions);
                $_SESSION['message'] = "Должность {$_POST['position']} откорректирована";
                header('Location: /positions');
                exit;
            }else{
                $_SESSION['message'] = "поле должность не может быть пустым";
                $_SESSION['post'] = $_POST;
                header('Location: /positions/correct/?id='.$_POST['id']);
                exit;
            }
        }

        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $positions = R::load('positions', $_GET['id']);
            if($positions->getID() == 0){
                throw new \Exception('нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
        $this->set(compact('positions'));
    }

}