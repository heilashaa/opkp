<?php

namespace app\controllers;

use btlc\App;
use RedBeanPHP\R;

class DepartmentsController extends AppController {
    /**
     * контроллер выводит все существующие в таблице записи с признаком visiable = 1
     */
    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Departments', 'Подразделения', 'Сайт, бтлц');
        $departments = R::findAll('departments', 'WHERE visiable = 1 ORDER BY department');
        $this->set(compact('departments'));
    }

    /**
     * @throws \Exception на 404error
     * контроллер добавления записи
     */
    public function addAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['submit'] && $_POST['department'] && $_POST['department_full']){
                $departments = R::findOne('departments', " WHERE department = '{$_POST['department']}' OR department_full = '{$_POST['department_full']}'");
                if(is_null($departments)){
                    $departments = R::dispense('departments');
                    $departments->department = $_POST['department'];
                    $departments->department_full = $_POST['department_full'];
                    R::store($departments);
                    $msg = "Подразделение {$departments->department} ({$departments->department_full}) добавленo";
                    $result = 'success';
                }elseif ($departments->visiable == 0){
                    $departments->visiable = 1;
                    R::store($departments);
                    $msg = "Подразделение {$departments->department} ({$departments->department_full}) существовало ранее и было восстановлено из удаленных записей. Новая запись не добавлена";
                    $result = 'success';
                }else{
                    $msg = "Подразделение {$departments->department} ({$departments->department_full}) существует. Нельзя добавить дубль";
                    $result = 'danger';
                }
                $this->redirect('/departments', $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect('/departments', 'danger', $msg);
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
            $department = R::load('departments', $_GET['id']);
            if($department->id != 0){
                $check = $this->checkingDependencyOfForeingKey('departments', $_GET['id']);
                if(!$check){
                    $department->visiable = 0;
                    R::store($department);
                    $msg = "Подразделение {$department->department} ({$department->department_full}) удалено";
                    $result = 'success';
                }else{
                    $msg = "Подразделение {$department->department} ({$department->department_full}) не может быть удалено. Оно связана с {$check['records']} записью(записями) в {$check['tables']} таблице(таблицах) в базе данных";
                    $result = 'danger';
                }
                $this->redirect('/departments', $result, $msg);
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
            if(!empty($_POST['department']) && !empty($_POST['department_full'])) {
                $departments = R::load('departments', $_POST['id']);//загружается старая существующая запись
                $matchDepartments = R::find('departments', 'WHERE department = ? OR department_full = ?', [$_POST['department'], $_POST['department_full']]);//ищутся совпадению с другими
                if($matchDepartments){
                    $msg ='';
                    $result = '';
                    foreach ($matchDepartments as $matchDepartment){
                        if($matchDepartment->id == $_POST['id']){
                            if($matchDepartment->department == $_POST['department'] && $matchDepartment->department_full == $_POST['department_full']){
                                $msg = "Подразделение {$_POST['department']} ({$_POST['department_full']}) не было откорректировано в базе данных, так как его название не было Вами изменено";
                                $result = 'danger';
                                break;
                            }
                            continue;
                        }
                        if($matchDepartment->visiable == 1){
                            $msg = "Подразделение {$departments->department} ({$departments->department_full}) не было откорректирована на {$_POST['department']} ({$_POST['department_full']}), так как существует подразделение {$matchDepartment->department} ({$matchDepartment->department_full}). Совпадения не допустимы";
                            $result = 'danger';
                        }else{
                            $matchDepartment->visiable = 1;
                            R::store($matchDepartment);
                            $msg = "Подразделение {$departments->department} ({$departments->department_full}) не была откорректирована на {$_POST['department']} ({$_POST['department_full']}), так как существует подразделение {$matchDepartment->department} ({$matchDepartment->department_full}) в удаленных записях. Подразделение {$matchDepartment->department} ({$matchDepartment->department_full}) восстановлено из удаленных записей";
                            $result = 'success';
                        }
                    }
                    if($msg != ''){$this->redirect(false, $result, $msg);}
                }
                $oldDepartment = $departments->department;
                $oldDepartmentFull = $departments->department_full;
                $departments->department = $_POST['department'];
                $departments->department_full = $_POST['department_full'];
                R::store($departments);
                $msg = "Подразделение {$oldDepartment} ({$oldDepartmentFull}) откорректировано на {$_POST['department']} ({$_POST['department_full']})";
                $result = 'success';
                $this->redirect('/departments', $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect("/departments/correct/?id = {$_POST['id']}", 'danger', $msg);//обратно с GEt прарметром
            }
        }
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $departments = R::load('departments', $_GET['id']);
            $this->set(compact('departments'));
            if($departments->getID() == 0){
                throw new \Exception('Нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('Нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
    }
}
