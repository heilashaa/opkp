<?php

namespace app\widgets\menu;

use btlc\App;
use btlc\Cache;
use btlc\libs\Debug;
use RedBeanPHP\R;

class Menu{

    /**
     * @var массив записей из необходимой таблицы свойства Menu::table
     */
    protected $data;
    /**
     * @var массив дерева из данных Menu::data
     */
    protected $tree;
    /**
     * @var готовый html код меню
     */
    protected $menuHtml;
    /**
     * @var string шаблон, который необходимо использовать для меню
     */
    protected $tpl;
    /**
     * @var string контйнер для меню /ul, select/ default <ul>
     */
    protected $container = 'ul';
    /**
     * @var string class элемента в разметке html
     */
    protected $class = 'menu';
    /**
     * @var string таблица в БД из которой необходимо брать данные
     */
    protected $table = 'menu';
    /**
     * @var string время, на которое необходимо кэшировать данные default 3600
     */
    protected $cache = '3600';
    /**
     * @var string имя, под которым сохраняется файл кэша
     */
    protected $cacheKey = 'menu_cache';
    /**
     * @var array массив дополнительных атрибутов для меню
     */
    protected $attrs = [];
    /**
     * @var string разделитель
     */
    protected $prepend = '';

    /**
     * Menu constructor.
     * @param array $options принимает массив настроек для заполнения полей объекта
     * запускает метод Menu::run()
     */
    public function __construct($options = []){
        $this->tpl = __DIR__. '/menu_tpl/menu.php';
        $this->setOptions($options);
        $this->run();
    }

    /**
     * @param $options заполнение полей объекта значениями из переданного массива property=>value
     */
    protected function setOptions($options){
        foreach ($options as $key => $value){
            if(property_exists($this, $key)){
                $this->$key = $value;
            }
        }
    }

    protected function run(){
        $this->menuHtml = Cache::get($this->cacheKey);
        if(!$this->menuHtml){
            $this->data = App::$app->getProperty('menu');
            if(!$this->data){
                $this->data = R::getAssoc("SELECT * FROM {$this->table}" );
            }
            $this->tree = $this->getTree();
            $this->menuHtml = $this->getMenuHtml($this->tree);
            if($this->cache){
                Cache::set($this->cacheKey, $this->menuHtml, $this->cache);
            }
        }
        $this->output();
    }

    /**
     * вывод готового меню html
     */
    protected function output(){
        $attrs = '';
        if(!empty($this->attrs)){
            foreach ($this->attrs as $k => $v){
                $attrs .= ' '.$k. '="'.$v.'"';//todo на двойные ковычки
            }
        }
        echo '<' .$this->container. ' class="' .$this->class. '"' . $attrs .'>';
            echo $this->prepend;
            echo $this->menuHtml;
        echo "</{$this->container}>";
    }

    /**
     * @return array возвращает по входящему массиву Menu::data массив дерева Menu::tree
     */
    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node){
            if(!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getMenuHtml($tree, $tab = ''){
        $str = '';
        foreach ($tree as $id => $category) {
            $str .= $this->catToTemplate($category, $tab, $id);
        }
        return $str;
    }

    protected function catToTemplate($category, $tab, $id){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}