<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\SiteUtils;
use RedBeanPHP\R;

class AccessesController extends AppController {
    /**
     * action выводит все существующие в таблице записи с признаком visiable = 1
     */
    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Accesses', 'Виды доступа', 'Сайт, бтлц');
        $accesses = R::findAll('accesses', 'WHERE visiable = 1');

        $actionsIds = implode(',',$this->getAllControllers());
        $actions = R::findAll('actions', "WHERE id IN ({$actionsIds}) ORDER BY controller");

        $connections = [];
        foreach ($actions as $action){
            if($action->sharedAccesses){
                foreach ($action->sharedAccesses as $access){
                    $connections[$action->id][$access->access] = $access->access;
                }
            }
        }
        $this->set(compact('accesses', 'actions','connections'));
    }

    /**
     * @throws \Exception контроллер сохраняет в БД зависимости Accesses vs Actions
     */
    public function saveAccessesAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) == 'save'){
            $connections =[];
            R::exec('DELETE FROM accesses_actions');
            foreach ($_POST as $key => $value){
                if(strpos($key, '-') !== false){
                    $key = explode('-',$key);
                    $action = R::load('actions', $key[0]);
                    $access = R::load('accesses', $key[1]);
                    $action->sharedAccesses[] = $access;
                    $connections[] = $action;
                }
            }
            R::storeAll($connections);
            $msg = 'Изменения в распределении доступа сохранены';
            $this->redirect(false, 'success', $msg);
        }else{
            throw new \Exception('Данные отправлены не методом POST',404);
        }
    }

    /**
     * @return array возвращает array id всех controllers и всех actions из таблицы actions при этом записывает в БД новые данные,
     * если их не было и берет из БД только те, которые есть в папке app/controllers
     */
    protected function getAllControllers(){
        $files = scandir(APP . '/controllers');
        $controllers =[];
        foreach ($files as $key => $file){
            if(strpos($file, 'Controller.php')){
                $file = str_replace('.php', '', $file);
                if(class_exists('app\controllers\\' . $file)){
                   $controllers[$key] = $file;
                }
            }
        }
        $result = [];
        foreach ($controllers as $controller){
            $temp = get_class_methods('app\controllers\\' . $controller);
            foreach ($temp as $k => $value){
                if(strpos($value, 'Action')){
//                    удалить экшен
                    $result[mb_strtolower(str_replace('Controller', '', $controller))][$k] = str_replace('Action', '', $value);
                }
            }
        }
        $allActionsIds = [];
        $count = 0;
        foreach ($result as $controller => $action){
            foreach ($action as $actionValue){
                $note = R::findOrCreate('actions', ['controller' => $controller, 'action' => $actionValue]);
                $allActionsIds[$count] = $note->id;
                $count++;
            }
        }
        return $allActionsIds;
    }

    /**
     * @param $accessName принимает имя поля в таблице accesses где есть право админ (admin == 1) и связывает это поле со всеми существующими действиями (app/controllers)
     */
    protected function setAdminAccess($accessName){
        $actionsIds = implode(',',$this->getAllControllers());
        $actions = R::findAll('actions', "WHERE id IN ({$actionsIds}) ORDER BY controller");
        $access = R::findOne('accesses', "WHERE access='{$accessName}'");
        $connections =[];
        foreach ($actions as $action){
            $action->sharedAccesses[] = $access;
            $connections[] = $action;
        }
        R::storeAll($connections);
        return;
    }

    /**
     * @param $actionId
     * @param $accessId
     * @return bool
     * метод принимает accesses_id и actions_id для проверки наличия связи в таблице accesses_actions
     */
    public static function isSharedAdmin($actionId, $accessId){
        $action = R::findOne('accesses_actions', "WHERE accesses_id='{$accessId})' AND actions_id='{$actionId})'");
        if(!$action){
            return false;
        }else{
            return true;
        }
    }

    /**
     * @throws \Exception на 404error
     * action добавления записи
     */
    public function addAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(SiteUtils::clear($_POST['submit']) && SiteUtils::clear($_POST['access'])){
                $accesses = R::findOrCreate('accesses', ['access'=>SiteUtils::clear($_POST['access'])]);
                if($accesses->hasChanged('id')){
                    $msg = "Вид доступа {$accesses->access} добавлен";
                    $result = 'success';
                    if(isset($_POST['admin']) == 'on'){
                        $previousAdmin = R::findOne('accesses', 'WHERE admin=1');
                        $previousAdmin->admin = 0;
                        R::store($previousAdmin);
                        $accesses->admin = 1;
                        R::store($accesses);
                        $this->setAdminAccess($accesses->access);
                        $msg .= ' с присвоением максимального доступа';
                    }
                }elseif ($accesses->visiable == 0){//восстанавлиевается из удаленных значений
                    $accesses->visiable = 1;
                    R::store($accesses);
                    $msg = "Вид доступа {$accesses->access} существовал ранее и был восстановлен из удаленных записей";
                    $result = 'success';
                    if(isset($_POST['admin']) == 'on'){
                        $previousAdmin = R::findOne('accesses', 'WHERE admin=1');
                        $previousAdmin->admin = 0;
                        R::store($previousAdmin);
                        $accesses->admin = 1;
                        R::store($accesses);
                        $this->setAdminAccess($accesses->access);
                        $msg .= ' с присвоением максимального доступа';
                    }
                }else{
                    $msg = "Вид доступа {$accesses->access} существует. Нельзя добать дубль";
                    $result = 'danger';
                }
                $this->redirect(false, $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect(false, 'danger', $msg);
            }
        }else{
            throw new \Exception('Данные отправлены не методом POST',404);
        }
    }

    /**
     * @throws \Exception на 404error
     * action удаляет запись по id c проверкой на наличие связанных таблиц. В случае зависимости от удаляемой записи других записей, удаление не происходит
     */
    public function deleteAction(){
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $access = R::load('accesses', SiteUtils::clear($_GET['id']));
            if($access->id != 0){
                if($access->admin == 1){
                    $msg = "Вид доступа {$access->access} не может быть удален. Он является основным в приложении с максимальным доступом";
                    $result = 'danger';
                }else{
                    $check = $this->checkingDependencyOfForeingKey('accesses', SiteUtils::clear($_GET['id']));
                    if(!$check){
                        $access->visiable = 0;
                        R::store($access);
                        $msg = "Вид доступа {$access->access} удален";
                        $result = 'success';
                    }else{
                        $msg = "Вид доступа {$access->access} не может быть удален. Он связан с {$check['records']} записью(записями) в {$check['tables']} таблице(таблицах) в базе данных";
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

    /**
     * @throws \Exception на 404error
     * action для корректировки записей с контролем наличия checkbox (максимальных прав доступа) только у одного пользователя
     */
    public function correctAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            if(!empty(SiteUtils::clear($_POST['access']))) {
                $accesses = R::load('accesses', SiteUtils::clear($_POST['id']));//изначальная версия записи
                $matchAccesses = R::findOne('accesses', 'WHERE access = ?', [SiteUtils::clear($_POST['access'])]);//поиск на совпадения по полю access
                if($matchAccesses){//есть совпадения
                    if($matchAccesses->id == SiteUtils::clear($_POST['id'])){//если новая версия совпадает с изначальной
                        if((isset($_POST['admin']) == 'on' && $accesses->admin == 1) || (!isset($_POST['admin']) && $accesses->admin == 0)){//checkbox не менялся
                            $msg = "Вид доступа ".SiteUtils::clear($_POST['access'])." не был откорректирована в базе данных, так как его название не было Вами изменено";
                            $result = 'danger';
                            $path = false;
                        }elseif (!isset($_POST['admin'])){//убран checkbox
                            $msg = "Вид доступа ".SiteUtils::clear($_POST['access'])." не был откорректирована в базе данных, так как в приложении должен быть хоть один пользователь с максимальным доступом";
                            $result = 'danger';
                            $path = false;
                        }else{//checkbox добавлен
                            $previousAdmin = R::findOne('accesses', 'WHERE admin=1');
                            $previousAdmin->admin = 0;
                            R::store($previousAdmin);
                            $accesses->admin = 1;
                            R::store($accesses);
                            $this->setAdminAccess($accesses->access);
                            $msg = "Вид доступа ".SiteUtils::clear($_POST['access'])." откорректирован на ".SiteUtils::clear($_POST['access'])." с присвоением максимального доступа";
                            $result = 'success';
                            $path = '/accesses';
                        }
                    }elseif($matchAccesses->visiable == 1){//если совпадает с другой существующей в базе записью
                        $msg = "Вид доступа {$accesses->access} не был откорректирован на ".SiteUtils::clear($_POST['access']).", так как такой вид доступа ".SiteUtils::clear($_POST['access'])." уже существует";
                        $result = 'danger';
                        $path = false;
                    }else{//восстанавлиевает ранее удаленный в базе
                        if(isset($_POST['admin']) == 'on'){//есть checkbox
                            $previousAdmin = R::findOne('accesses', 'WHERE admin=1');
                            $previousAdmin->admin = 0;
                            R::store($previousAdmin);
                            $matchAccesses->visiable = 1;
                            $matchAccesses->admin = 1;
                            R::store($matchAccesses);
                            $this->setAdminAccess($matchAccesses->access);
                            $msg = "Вид доступа {$accesses->access} не был откорректирован на ".SiteUtils::clear($_POST['access']).", так как такой вид доступа ".SiteUtils::clear($_POST['access'])." уже существует в удаленных записях. Вид доступа ".SiteUtils::clear($_POST['access'])." восстановлен из удаленных записей с присвоением максимального доступа";
                            $result = 'success';
                            $path = '/accesses';
                        }else{//нет checkbox
                            $matchAccesses->visiable = 1;
                            R::store($matchAccesses);
                            $msg = "Вид доступа {$accesses->access} не был откорректирован на ".SiteUtils::clear($_POST['access']).", так как такой вид доступа ".SiteUtils::clear($_POST['access'])." уже существует в удаленных записях. Вид доступа ".SiteUtils::clear($_POST['access'])." восстановлен из удаленных записей";
                            $result = 'success';
                            $path = '/accesses';
                        }
                    }
                    $this->redirect($path, $result, $msg);
                }else{//нет совпадений
                    if((isset($_POST['admin']) == 'on' && $accesses->admin == 1) || (!isset($_POST['admin']) && $accesses->admin == 0)){//если checkbox не менялся
                        $oldAccess = $accesses->access;
                        $accesses->access = SiteUtils::clear($_POST['access']);
                        R::store($accesses);
                        $msg = "Вид доступа {$oldAccess} откорректирован на ".SiteUtils::clear($_POST['access']);
                        $result = 'success';
                        $path ='/accesses';
                    }elseif (isset($_POST['admin']) == 'on'){//поменялся на admin
                        $previousAdmin = R::findOne('accesses', 'WHERE admin=1');
                        $previousAdmin->admin = 0;
                        R::store($previousAdmin);
                        $oldAccess = $accesses->access;
                        $accesses->access = SiteUtils::clear($_POST['access']);
                        $accesses->admin = 1;
                        R::store($accesses);
                        $this->setAdminAccess($accesses->access);
                        $msg = "Вид доступа {$oldAccess} откорректирован на ".SiteUtils::clear($_POST['access'])." с присвоением максимального доступа";
                        $result = 'success';
                        $path = '/accesses';
                    }else{//удален checkbox админа
                        $msg = "У вида доступа {$accesses->access} нельзя отменить максимальный доступ, так как он является основным в приложении. Вид доступа {$accesses->access} не откорректирован";
                        $result = 'danger';
                        $path = false;
                    }
                }
                $this->redirect($path, $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect(false, 'danger', $msg);
            }
        }
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $accesses = R::load('accesses', SiteUtils::clear($_GET['id']));
            $this->set(compact('accesses'));
            if($accesses->getID() == 0){
                throw new \Exception('Нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('Нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
    }

    /**
     * @throws \Exception на 404error
     * action для корректировки описания допустимого действия в приложении
     */
    public function correctActAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            if(!empty(SiteUtils::clear($_POST['description']))) {
                $actions = R::load('actions', SiteUtils::clear($_POST['id']));
                $matchActions = R::findOne('actions', 'WHERE description = ?', [SiteUtils::clear($_POST['description'])]);
                if($matchActions){
                    if($matchActions->id == SiteUtils::clear($_POST['id'])){
                        $msg = "Описание допустимого действия ".SiteUtils::clear($_POST['description'])." не было откорректировано в базе данных, так как его название не было Вами изменено";
                        $result = 'danger';
                    }else{
                        $msg = "Описание допустимого действия {$actions->description} не было откорректирована на ".SiteUtils::clear($_POST['description']).", так как такое описание ".SiteUtils::clear($_POST['description'])." уже существует. Дубли не допустимы";
                        $result = 'danger';
                    }
                    $this->redirect(false, $result, $msg);
                }else{
                    $oldActions = $actions->description;
                    $actions->description = SiteUtils::clear($_POST['description']);
                    R::store($actions);
                    $msg = "Описание допустимого действия {$oldActions} откорректировано на ".SiteUtils::clear($_POST['description']);
                    $result = 'success';
                }
                $this->redirect('/accesses', $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect(false, 'danger', $msg);
            }
        }
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $actions = R::load('actions', SiteUtils::clear($_GET['id']));
            $this->set(compact('actions'));
            if($actions->getID() == 0){
                throw new \Exception('Нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('Нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
    }

}