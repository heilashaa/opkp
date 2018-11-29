<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\Debug;
use btlc\libs\SiteUtils;
use RedBeanPHP\R;

class EmployeesController extends AppController{

    /**
     * контроллер выводит все существующие в таблице записи с признаком visiable = 1
     */
    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Employees', 'Сотрудники', 'Сайт, бтлц');
        $employees = R::findAll('employees', 'WHERE visiable = 1 ORDER BY employee_surname ');
        $departments = R::findAll('departments', 'WHERE visiable = 1 ORDER BY department ');
        $positions = R::findAll('positions', 'WHERE visiable = 1 ORDER BY position ');
        $accesses = R::findAll('accesses', 'WHERE visiable = 1 ORDER BY access ');
        $this->set(compact('employees' , 'departments' , 'positions', 'accesses'));
    }

    /**
     * сонтроллер входа в приложение
     */
    public function loginAction(){
        if(isset($_POST['submit'])){
            $result = R::findOne('employees', "WHERE employee_name=? AND employee_surname=? AND password=?",
                [
                    SiteUtils::clear($_POST['employee_name']),
                    SiteUtils::clear($_POST['employee_surname']),
                    SiteUtils::clear($_POST['password']),
                ]);
            $accesses = App::$app->getProperty('accesses');
            if(!$result || !array_key_exists($result->accesses_id, $accesses)){//!array_key_exists($result->accesses_id, $accesses) проверяет на наличие у пользователя хоть каких-нибудь доступов. если пользователь зарегистрирован, но у него нет ни одного досступа, тогда он не залогинится
                $this->redirect(false, 'danger', 'Не правильные данные для входа');
            }else{
                $_SESSION['employee']['name'] = $result->employee_name;
                $_SESSION['employee']['surname'] = $result->employee_surname;
                $_SESSION['employee']['middlename'] = $result->employee_middlename;
                $_SESSION['employee']['id'] = $result->id;
                $_SESSION['employee']['accesses_id'] = $result->accesses_id;
                if(array_key_exists('main' , $accesses[$result->accesses_id])){
                    $path = '/';
                }else{
                    $path = '/'.key($accesses[$result->accesses_id]);
                }
                $this->redirect($path, 'success',"{$_SESSION['employee']['name']}, добро пожаловать в приложение");
            }
        }
    }

    /**
     * контроллер выхода из приложения
     */
    public function logoutAction(){
        unset($_SESSION['employee']);
        $this->redirect('/employees/login', '','' , false);
    }

    /**
     * @throws \Exception action добавления сотрудника
     */
    public function addAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(isset($_POST['submit']) &&
                !empty(SiteUtils::clear($_POST['employee_name'])) &&
                !empty(SiteUtils::clear($_POST['employee_surname'])) &&
                !empty(SiteUtils::clear($_POST['employee_middlename'])) &&
                !empty(SiteUtils::clear($_POST['department'])) &&
                !empty(SiteUtils::clear($_POST['position'])) &&
                !empty(SiteUtils::clear($_POST['password'])) &&
                !empty(SiteUtils::clear($_POST['access']))) {
                $employees = R::findOne('employees', ' WHERE employee_name = ? AND employee_surname = ? AND employee_middlename = ? OR email = ?', [SiteUtils::clear($_POST['employee_name']), SiteUtils::clear($_POST['employee_surname']), SiteUtils::clear($_POST['employee_middlename']), SiteUtils::clear($_POST['email'])]);
                if(is_null($employees)) {
                    $employee = R::dispense('employees');
                    $employee->employee_name = SiteUtils::clear($_POST['employee_name']);
                    $employee->employee_surname = SiteUtils::clear($_POST['employee_surname']);
                    $employee->employee_middlename = SiteUtils::clear($_POST['employee_middlename']);
                    $employee->departments_id = SiteUtils::clear($_POST['department']);
                    $employee->positions_id = SiteUtils::clear($_POST['position']);
                    $employee->email = SiteUtils::clear($_POST['email']);
                    $employee->mobil_phone = SiteUtils::clear($_POST['mobil_phone']);
                    $employee->work_phone = SiteUtils::clear($_POST['work_phone']);
                    $employee->password = SiteUtils::clear($_POST['password']);
                    $employee->accesses_id = SiteUtils::clear($_POST['access']);
                    $employee->birthday = strtotime(SiteUtils::clear($_POST['birthday']));
                    $employee->employment_date = strtotime(SiteUtils::clear($_POST['employment_date']));
                    $employee->education = SiteUtils::clear($_POST['education']);
                    R::store($employee);
                    $msg = "Работник {$employee->employee_name} {$employee->employee_middlename} {$employee->employee_surname} c правом доступа {$employee->accesses->access} добавлен";
                    $result = 'success';
                }elseif($employees->visiable == 1){
                    if(!SiteUtils::clear($_POST['email']) == ''){
                        $email = ' c email '.SiteUtils::clear($_POST['email']);
                    }else{
                        $email = '';
                    }
                    $msg = "Вы пытаетесь создать сотрудника " .SiteUtils::clear($_POST['employee_surname']). " " .SiteUtils::clear($_POST['employee_name']). " " .SiteUtils::clear($_POST['employee_middlename']). $email .". При этом существует сотрудник {$employees->employee_surname} {$employees->employee_name} {$employees->employee_middlename} с email {$employees->email}. Нельзя создать сотрудника с одинаковыми ФИО или email";
                    $result = 'danger';
                }else{
                    $employees->visiable = 1;
                    R::store($employees);
                    $msg = "В удаленных записях о сотрудниках существует сутрудник {$employees->employee_surname} {$employees->employee_name} {$employees->employee_middlename}. Эта запись восстановлена. Откорректируйте эту восстановленую запись с необходимыми параметрами. Новая запись не добавлена";
                    $this->redirect('/employees/correct/?id=' . $employees->id, 'danger', $msg);//todo протестить этот redirect
                }
                $this->redirect(false, $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;//todo надо гдето чистить сессию
                $msg = "Заполните все необходимые поля";
                $this->redirect(false, 'danger', $msg);
            }
        }else{
            throw new \Exception('Данные отправлены не методом POST',404);
        }
    }

    /**
     * @throws \Exception action корректировки сотрудника
     */

//Array
//(
//[id] => 2
//[employee_surname] => Гейлаш
//[employee_name] => Александр
//[employee_middlename] => Александрович
//[department] => 1
//[position] => 1
//[email] => a.heilash@belint.by
//[mobil_phone] => +375295258439
//[work_phone] => +375172251171
//[password] => 12345
//[access] => 2
//[birthday] => 1970-09-29
//[employment_date] => 1971-09-11
//[education] => БелГУТ 2008 очно, АУ при Президентае РБ 2016 заочно
//[submit] => save
//)

    public function correctAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){

            //+проверка на заполнение обязательных полей
            //если совпадает ФИО или email
            //если админ один, то нельзя изменить доступ

            if(!empty(SiteUtils::clear($_POST['employee_name'])) &&
                !empty(SiteUtils::clear($_POST['employee_surname'])) &&
                !empty(SiteUtils::clear($_POST['employee_middlename'])) &&
                !empty(SiteUtils::clear($_POST['department'])) &&
                !empty(SiteUtils::clear($_POST['position'])) &&
                !empty(SiteUtils::clear($_POST['password'])) &&
                !empty(SiteUtils::clear($_POST['access']))) {

                $employees = R::load('employees', SiteUtils::clear($_POST['id']));//загружается старая существующая запись
                $matchEmployees = R::find('employees', ' WHERE employee_name = ? AND employee_surname = ? AND employee_middlename = ? OR email = ?', [SiteUtils::clear($_POST['employee_name']), SiteUtils::clear($_POST['employee_surname']), SiteUtils::clear($_POST['employee_middlename']), SiteUtils::clear($_POST['email'])]);//ищутся совпадению с другими
//                Debug::arrWithExit($matchEmployees);

                if(!empty($matchEmployees)){
                    $msg ='';
                    $result = '';
                    foreach ($matchEmployees as $matchEmployee){
                        if($matchEmployee->id == SiteUtils::clear($_POST['id'])){
//                            if($matchEmployee->department == $_POST['department'] && $matchEmployee->department_full == $_POST['department_full']){
////                                $msg = "Подразделение {$_POST['department']} ({$_POST['department_full']}) не было откорректировано в базе данных, так как его название не было Вами изменено";
////                                $result = 'danger';
////                                break;
////                            }
                            continue;
                        }
                        if($matchEmployee->visiable == 1){
                            $msg = "Подразделение {$departments->department} ({$departments->department_full}) не было откорректирована на {$_POST['department']} ({$_POST['department_full']}), так как существует подразделение {$matchEmployee->department} ({$matchDepartment->department_full}). Совпадения не допустимы";
                            $result = 'danger';
                        }else{
                            $matchEmployee->visiable = 1;
                            R::store($matchEmployee);
                            $msg = "Подразделение {$departments->department} ({$departments->department_full}) не была откорректирована на {$_POST['department']} ({$_POST['department_full']}), так как существует подразделение {$matchEmployee->department} ({$matchDepartment->department_full}) в удаленных записях. Подразделение {$matchDepartment->department} ({$matchDepartment->department_full}) восстановлено из удаленных записей";
                            $result = 'success';
                        }
                    }
                    if($msg != ''){$this->redirect(false, $result, $msg);}
                }
                    $oldEmployeeSurname= $employees->employee_surname;
                    $oldEmployeeName = $employees->employee_name;
                    $oldEmployeeMiddlename = $employees->employee_middlename;
                    $employees->employee_name = SiteUtils::clear($_POST['employee_name']);
                    $employees->employee_surname = SiteUtils::clear($_POST['employee_surname']);
                    $employees->employee_middlename = SiteUtils::clear($_POST['employee_middlename']);
                    $employees->departments_id = SiteUtils::clear($_POST['department']);
                    $employees->positions_id = SiteUtils::clear($_POST['position']);
                    $employees->email = SiteUtils::clear($_POST['email']);
                    $employees->mobil_phone = SiteUtils::clear($_POST['mobil_phone']);
                    $employees->work_phone = SiteUtils::clear($_POST['work_phone']);
                    $employees->password = SiteUtils::clear($_POST['password']);
                    $employees->accesses_id = SiteUtils::clear($_POST['access']);
                    $employees->birthday = strtotime(SiteUtils::clear($_POST['birthday']));
                    $employees->employment_date = strtotime(SiteUtils::clear($_POST['employment_date']));
                    $employees->education = SiteUtils::clear($_POST['education']);
                    R::store($employees);
                    $msg = "Откорректированные данные по сотруднику {$oldEmployeeSurname} {$oldEmployeeName} {$oldEmployeeMiddlename} сохранены";
                    $result = 'success';
                    $this->redirect('/employees', $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect("/employees/correct/?id = " . SiteUtils::clear($_POST['id']), 'danger', $msg);
            }
        }
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $employees = R::load('employees', SiteUtils::clear($_GET['id']));
            if($employees->getID() == 0){
                throw new \Exception('Нет такой записи для редактирования', 404);
            }
            $departments = R::findAll('departments', 'WHERE visiable = 1 ORDER BY department ');
            $positions = R::findAll('positions', 'WHERE visiable = 1 ORDER BY position ');
            $accesses = R::findAll('accesses', 'WHERE visiable = 1 ORDER BY access ');
            $this->set(compact('employees' , 'departments' , 'positions', 'accesses'));
        }else{
            throw new \Exception('Нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
    }

    /**
     * @throws \Exception action удаления сотрудника
     */
    public function deleteAction(){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $employee = R::load('employees', SiteUtils::clear($_GET['id']));
            $adminId = R::findOne('accesses', 'WHERE admin=1');
            if($employee->id != 0){
                if($employee->id == $_SESSION['employee']['id']){
                    $msg = 'Нелья удалить пользователя от имени которого вы вошли в приложение';
                    $result = 'danger';
                }elseif($employee->accesses_id == $adminId->id){
                    $msg = "Нелья удалить сотрудника {$employee->employee_surname} {$employee->employee_name} {$employee->employee_middlename}, так как он имеет максимальный доступ к приложению. Для удаления необходимо изменить у данного сотрудника тип доступа";
                    $result = 'danger';
                }else{
                    $check = $this->checkingDependencyOfForeingKey('employees', SiteUtils::clear($_GET['id']));
                    if(!$check){
                        $employee->visiable = 0;
                        R::store($employee);
                        $msg = "Сотрудник {$employee->employee_surname} {$employee->employee_name} {$employee->employee_middlename} удален";
                        $result = 'success';
                    }else{
                        $msg = "Сотрудник {$employee->employee_surname} {$employee->employee_name} {$employee->employee_middlename} не может быть удален. Запись о нем связана с {$check['records']} записью(записями) в {$check['tables']} таблице(таблицах) в базе данных";
                        $result = 'danger';
                    }
                }
                $this->redirect(false, $result, $msg);
            }else{
                throw new \Exception('Нет такой записи для удаления. Контроллер должен принять параметр id для удаления определнной записи',404);
            }
        }else{
            throw new \Exception('Не правильные параметры для удаления записи. Контроллер должен принять параметр id для удаления определнной записи',404);
        }
    }
}

//todo поудалять во всех видов ок на зеленых полях и оставить только на на красных