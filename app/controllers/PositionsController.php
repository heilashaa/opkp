<?php

namespace app\controllers;

use btlc\App;
use RedBeanPHP\R;

class PositionsController extends AppController {

    /**
     * контроллер выводит все существующие в таблице записи с признаком visiable = 1
     */
    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Positions', 'Должности', 'Сайт, бтлц');
        $positions = R::findAll('positions', 'WHERE visiable = 1');
        $this->set(compact('positions'));
    }

    /**
     * @throws \Exception на 404error
     * контроллер добавления записи
     */
    public function addAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['submit'] && $_POST['position']){
                $positions = R::findOrCreate('positions', ['position'=>$_POST['position']]);
                if($positions->hasChanged('id')){
                    $msg = "Должность {$positions->position} добавлена";
                    $result = 'success';
                }elseif ($positions->visiable == 0){
                    $positions->visiable = 1;
                    R::store($positions);
                    $msg = "Должность {$positions->position} существовала ранее и была восстановлена из удаленных записей";
                    $result = 'success';
                }else{
                    $msg = "Должность {$positions->position} существует";
                    $result = 'danger';
                }
                $this->redirect('/positions', $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect('/positions', 'danger', $msg);
            }
        }else{
            throw new \Exception('Данные отправлены не методом POST',404);
        }
    }

    /**
     * @throws \Exception на 404error
     * контроллер удаляет запись по id c проверкой на наличие связанных таблиц. В случае зависимости от удаляемой записи других записей, удаление не происходит
     */
    public function deleteAction(){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $position = R::load('positions', $_GET['id']);
            if($position->id != 0){
                $check = $this->checkingDependencyOfForeingKey('positions', $_GET['id']);
                if(!$check){
                    $position->visiable = 0;
                    R::store($position);
                    $msg = "Должность {$position->position} удалена";
                    $result = 'success';
                }else{
                    $msg = "Должность {$position->position} не может быть удалена. Она связана с {$check['records']} записью(записями) в {$check['tables']} таблице(таблицах) в базе данных";
                    $result = 'danger';
                }
                $this->redirect('/positions', $result, $msg);
            }else{
                throw new \Exception('Нет такой записи для удаления. Контроллер должен принять параметр id для удаления определнной записи',404);
            }
        }else{
            throw new \Exception('Не правильные параметры для удаления записи. Контроллер должен принять параметр id для удаления определнной записи',404);
        }
    }

    /**
     * @throws \Exception на 404error
     * контроллер для корректировки записей
     */
    public function correctAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            if(!empty($_POST['position'])) {
                $positions = R::load('positions', $_POST['id']);
                $matchPositions = R::findOne('positions', 'WHERE position = ?', [$_POST['position']]);
                if($matchPositions){
                    if($matchPositions->id == $_POST['id']){
                        $msg = "Должность {$_POST['position']} не была откорректирована в базе данных, так как ее название не было Вами изменено";
                        $result = 'danger';
                    }elseif($matchPositions->visiable == 1){
                        $msg = "Должность {$positions->position} не была откорректирована на {$_POST['position']}, так как такая должность {$_POST['position']} уже существует";
                        $result = 'danger';
                    }else{
                        $matchPositions->visiable = 1;
                        R::store($matchPositions);
                        $msg = "Должность {$positions->position} не была откорректирована на {$_POST['position']}, так как такая должность {$_POST['position']} уже существует в удаленных записях. Должность {$_POST['position']} восстановлена из удаленных записей";
                        $result = 'success';
                    }
                }else{
                    $oldPosition = $positions->position;
                    $positions->position = $_POST['position'];
                    R::store($positions);
                    $msg = "Должность {$oldPosition} откорректирована на {$_POST['position']}";
                    $result = 'success';
                }
                $this->redirect('/positions', $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect("/positions/correct/?id = {$_POST['id']}", 'danger', $msg);//обратно с GEt прарметром
            }
        }
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $positions = R::load('positions', $_GET['id']);
            $this->set(compact('positions'));
            if($positions->getID() == 0){
                throw new \Exception('Нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('Нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
    }
}
