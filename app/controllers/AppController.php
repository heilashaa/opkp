<?php

namespace app\controllers;

use app\models\AppModel;
use btlc\App;
use btlc\base\Controller;
use btlc\Cache;
use RedBeanPHP\R;

class AppController extends Controller {

    /**
     * @var bool | array хранит или сессию с данными пользователя либо false
     */
    protected $employee = false;

    public function __construct($route) {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperty('menu', self::cacheMenu());
        App::$app->setProperty('accesses', self::cacheAccesses());
        $this->setEmployee();
        $this->checkEmployeeAccess();
    }

    /**
     * @return array|bool формирует кэш меню
     */
    public static function cacheMenu($time = 3600){
        $menu = Cache::get('menu');
        if(!$menu){
            $menu = R::getAssoc("SELECT * FROM menu");
            Cache::set('menu', $menu, $time);
        }
        return $menu;
    }

    /**
     * @param bool $http
     * @param string $result
     * @param string $msg
     */
    protected function redirect($http = false, $result = 'danger', $msg = 'Что-то пошло не так', $posting = true)    {
        if ($http) {
            $redirect = $http;
        } else {
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }
        if($posting){
            $this->setSessionMsg($result, $msg);
        }
        header("Location: $redirect");
        exit;
    }

    /**
     * @param $result
     * @param $msg
     */
    protected function setSessionMsg($result, $msg){
        switch ($result) {
            case 'success':
                $_SESSION['msg']['result'] = $result;
                break;
            case 'danger':
                $_SESSION['msg']['result'] = $result;
                break;
            default:
                $_SESSION['msg']['result'] = 'danger';
                break;
        }
        $_SESSION['msg']['text'] = $msg;
        return;
    }

    /**
     * @param $tableName
     * название таблицы (родительской таблицы), от записей которой зависят записи другой таблицы
     * @param $id
     * id записи из родительской таблицы
     * @return array|bool возвращает или false если нет зависимых записей, или массив
     * [tables=>int,records=>int]
     */
    protected function checkingDependencyOfForeingKey($tableName, $id){
        $referringTables = R::getAll("SELECT table_name, column_name FROM information_schema.key_column_usage WHERE referenced_table_name = '{$tableName}'");
        if(!empty($referringTables)){
            $result = ['tables' => 0, 'records' => 0];
            foreach ($referringTables as $value){
                $countRecords = R::exec("SELECT * FROM {$value['table_name']} WHERE {$value['column_name']} = $id AND visiable = 1");
                if($countRecords > 0) {
                    $result['tables']++;
                    $result['records'] += $countRecords;
                }
            }
            if($result['tables']>0){
                return $result;
            }
        }
        return false;
    }

    /**
     * @return array|bool формирует кэш видов доступа
     */
    protected function cacheAccesses($time = 3600){
        $accesses = Cache::get('accesses');
        if(!$accesses){
            $ids = R::getAssoc('SELECT id FROM accesses');
            $result = [];
            foreach ($ids as $id){
                $accesses = R::load('accesses', $id)->sharedActions;
                foreach ($accesses as $key => $access){
                    $result[$id][$access->controller][] = $access->action;
                }
            }
            Cache::set('accesses', $result, $time);
            $accesses = $result;
        }
        return $accesses;
    }

    /**
     * метод проверки прав доступа пользователя. Допускает залогиненого пользователя только к открытым для его роли страницам.
     * Не залогининых пользователей редиректит на login страницу
     */
    public function checkEmployeeAccess(){
        $employee = $this->getEmployee();
        if(is_array($employee)){
            if($this->action == 'login' && mb_strtolower($this->controller) == 'employees'){
                $this->redirect('/','','',false);
            }
            $accesses = App::$app->getProperty('accesses');
            if(isset($accesses[$employee['accesses_id']][mb_strtolower($this->controller)]) && in_array($this->action, $accesses[$employee['accesses_id']][mb_strtolower($this->controller)])){
                return;
            }else{
                $this->redirect(false, 'danger', 'У вас не достаточно прав для посещения этой страницы или выполнения действия');
            }
        }else{
            if($this->action == 'login' && mb_strtolower($this->controller) == 'employees'){
                return;
            }
            $this->redirect('/employees/login','','', false);
        }
    }

    /**
     * записывает в свойство $this->employee $_SESSION[employee]
     */
    protected function setEmployee(){
        if(isset($_SESSION['employee'])){
            $this->employee = $_SESSION['employee'];
        }
        return;
    }

    public function getEmployee(){
        return $this->employee;
    }

}