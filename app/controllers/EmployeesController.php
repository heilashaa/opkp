<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\SiteUtils;
use RedBeanPHP\R;

class EmployeesController extends AppController{
    /**
     * контроллер выводит все существующие в таблице записи с признаком visiable = 1
     */
    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Employees', 'Сотрудники', 'Сайт, бтлц');
        $employees = R::findAll('employees', 'WHERE visiable = 1 ORDER BY employee_surname ');
        $this->set(compact('employees'));
    }

    public function loginAction(){
//        $this->checkEmployeeAccess();
        if(isset($_POST['submit'])){
            $result = R::findOne('employees', "WHERE employee_name=? AND employee_surname=? AND password=?",
                [SiteUtils::clear($_POST['employee_name']),
                SiteUtils::clear($_POST['employee_surname']),
                SiteUtils::clear($_POST['password']),
            ]);
            if(!$result){
                $this->redirect(false, 'danger', 'Не правильные данный для входа');
            }else{




                $_SESSION['employee']['name'] = $result->employee_name;
                $_SESSION['employee']['surname'] = $result->employee_surname;
                $_SESSION['employee']['middlename'] = $result->employee_middlename;
                $_SESSION['employee']['id'] = $result->id;
                $_SESSION['employee']['accesses_id'] = $result->accesses_id;
            }
        }

        //если такой employee есть и у него есть статус



    }

    public function logoutAction(){

    }



}