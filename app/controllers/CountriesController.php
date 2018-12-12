<?php

namespace app\controllers;

use btlc\App;
use btlc\libs\SiteUtils;
use RedBeanPHP\R;

class CountriesController extends AppController {
    /**
     * action выводит все существующие в таблице записи с признаком visiable = 1
     */
    public function indexAction(){
        $this->setMeta(App::$app->getProperty('site_name'). 'Countries', 'Страны', 'Сайт, бтлц');
        $countries = R::findAll('countries', 'WHERE visiable = 1 ORDER BY country');
        $this->set(compact('countries'));
    }

    /**
     * @throws \Exception на 404error
     * action добавления записи
     */
    public function addAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(SiteUtils::clear($_POST['submit']) && SiteUtils::clear($_POST['country'])){
                $countries = R::findOrCreate('countries', ['country'=>SiteUtils::clear($_POST['country'])]);
                if($countries->hasChanged('id')){
                    $msg = "Страна {$countries->country} добавлена";
                    $result = 'success';
                }elseif ($countries->visiable == 0){
                    $countries->visiable = 1;
                    R::store($countries);
                    $msg = "Страна {$countries->country} существовала ранее и была восстановлена из удаленных записей";
                    $result = 's  $msg = "Страна {$countries->country} существует. Нельзя добавить дубль";uccess';
                }else{

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
            $country = R::load('countries', SiteUtils::clear($_GET['id']));
            if($country->id != 0){
                $check = $this->checkingDependencyOfForeingKey('countries', SiteUtils::clear($_GET['id']));
                if(!$check){
                    $country->visiable = 0;
                    R::store($country);
                    $msg = "Страна {$country->country} удалена";
                    $result = 'success';
                }else{
                    $msg = "Страна {$country->country} не может быть удалена. Она связана с {$check['records']} записью(записями) в {$check['tables']} таблице(таблицах) в базе данных";
                    $result = 'danger';
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
     * action для корректировки записей
     */
    public function correctAction(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
            if(!empty(SiteUtils::clear($_POST['country']))) {
                $countries = R::load('countries', SiteUtils::clear($_POST['id']));
                $matchCountries = R::findOne('countries', 'WHERE country = ?', [SiteUtils::clear($_POST['country'])]);
                if($matchCountries){
                    if($matchCountries->id == SiteUtils::clear($_POST['id'])){
                        $msg = "Страна " .SiteUtils::clear($_POST['country']). " не была откорректирована в базе данных, так как ее название не было Вами изменено";
                        $result = 'danger';
                    }elseif($matchCountries->visiable == 1){
                        $msg = "Страна {$countries->country} не была откорректирована на " .SiteUtils::clear($_POST['country']). ", так как такая страна ".SiteUtils::clear($_POST['country'])." уже существует";
                        $result = 'danger';
                    }else{
                        $matchCountries->visiable = 1;
                        R::store($matchCountries);
                        $msg = "Страна {$countries->country} не была откорректирована на ".SiteUtils::clear($_POST['country']).", так как такая страна ".SiteUtils::clear($_POST['country'])." уже существует в удаленных записях. Страна ".SiteUtils::clear($_POST['country'])." восстановлена из удаленных записей";
                        $result = 'success';
                    }
                    $this->redirect(false, $result, $msg);
                }else{
                    $oldCountry = $countries->country;
                    $countries->country = SiteUtils::clear($_POST['country']);
                    R::store($countries);
                    $msg = "Страна {$oldCountry} откорректирована на ".SiteUtils::clear($_POST['country']);
                    $result = 'success';
                }
                $this->redirect(false, $result, $msg);
            }else{
                $_SESSION['post'] = $_POST;
                $msg = "Заполните все необходимые поля";
                $this->redirect(false, 'danger', $msg);
            }
        }
        if(isset($_GET['id']) && is_numeric($_GET['id'])){
            $countries = R::load('countries', SiteUtils::clear($_GET['id']));
            $this->set(compact('countries'));
            if($countries->getID() == 0){
                throw new \Exception('Нет такой записи для редактирования', 404);
            }
        }else{
            throw new \Exception('Нет параметров для редактирования. Контроллер должен принять параметр id для редактирования определнной записи',404);
        }
    }
}
