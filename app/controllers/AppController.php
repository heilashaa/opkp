<?php

namespace app\controllers;

use app\models\AppModel;
use btlc\App;
use btlc\base\Controller;
use btlc\Cache;
use btlc\libs\Debug;
use RedBeanPHP\R;

class AppController extends Controller {

    public function __construct($route) {
        parent::__construct($route);
        new AppModel();//todo при добавлении, проверять наличие записей в invisible
        App::$app->setProperty('menu', self::cacheMenu());
    }

    /**
     * @return array|bool формирует кэш меню
     */
    public static function cacheMenu(){
        $menu = Cache::get('menu');
        if(!$menu){
            $menu = R::getAssoc("SELECT * FROM menu");
            Cache::set('menu', $menu);
        }
        return $menu;
    }

    /**
     * @param bool $http
     * @param string $result
     * @param string $msg
     */
    protected function redirect($http = false, $result = 'danger', $msg = 'default message')    {
        if ($http) {
            $redirect = $http;
        } else {
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }
        $this->setSessionMsg($result, $msg);
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
     * @param $tableName название таблицы (родительской таблицы), от записей которой зависят записи другой таблицы
     * @param $id id записи из родительской таблицы
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
}