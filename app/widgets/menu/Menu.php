<?php

namespace app\widgets\menu;

use btlc\App;
use btlc\Cache;
use RedBeanPHP\R;

class Menu{

    /**
     * @var массив записей из необходимой таблицы свойства Menu::table
     */
    protected $data;
    protected $tree;
    protected $menuHtml;
    protected $tpl = __DIR__. '/menu/menu_tpl.php';
    protected $container = 'ul';
    protected $table = 'menu';
    protected $cache = '3600';
    protected $cacheKey = 'menu_cache';
    protected $attrs = [];
    protected $prepend = '';

    public function __construct($options = []){
        $this->getOptions($options);
        $this->run();
    }

    protected function getOptions($options){
        foreach ($options as $key => $value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    protected function run(){
        $this->menuHtml = Cache::get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->setProperty('menu');
            if(!$this->data){
                $this->data = R::getAssoc("SELECT * FROM {$this->table}" );
            }
        }
        $this->output();
    }

    protected function output(){
        echo $this->menuHtml;
    }

    protected function getTree(){

    }

    protected function getMenuHtml($tree, $tab = ''){

    }

    protected function catToTemplate($category, $tab, $id){

    }

}