<?php

namespace app\controllers;

use btlc\App;
use RedBeanPHP\R;

/**
 * Class DepartmentsController
 * @package app\controllers
 */
class DepartmentsController extends AppController{

    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Departments', 'Структурные подразделения', 'Сайт, бтлц');
        $departments = R::findAll('departments', 'WHERE visiable = 1');
        $this->set(compact('departments'));
    }

    public function addAction(){
        if($_POST['submit'] && $_POST['department'] && $_POST['department_full']){
            $departments = R::dispense('departments');
            $departments->department = $_POST['department'];
            $departments->department_full = $_POST['department_full'];
            $departments->note = $_POST['note'];
            $id = R::store($departments);
            header('Location: /departments');
            exit;

        }else{
            $_SESSION['post'] = $_POST;
            $_SESSION['message'] = 'заполните все поля';
            header('Location: /departments');
            exit;
        }
    }

    public function deleteAction(){
        if($_GET['id'] && is_numeric($_GET['id'])){
            $department = R::load('departments', $_GET['id']);
            $department->visiable = 0;
            R::store($department);
            $_SESSION['message'] = "Структурное подразделение {$department->department} удалено";
            header('Location: /departments');
            exit;
        }
    }

    /**
     * @throws \Exception
     */
    public function correctAction(){
        if(isset($_POST['submit'])){
            if(!empty($_POST['department']) && !empty($_POST['department_full'])) {
                $departments = R::load('departments', $_POST['id']);
                $departments->department = $_POST['department'];
                $departments->department_full = $_POST['department_full'];
                $departments->note = $_POST['note'];
                R::store($departments);
                $_SESSION['message'] = "Отдел {$_POST['department']} откорректирован";
                header('Location: /departments');
                exit;
            }else{
                $_SESSION['message'] = "поля departmen и department_full не могут быть пустыми";
                $_SESSION['post'] = $_POST;
                header('Location: /departments/correct/?id='.$_POST['id']);
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