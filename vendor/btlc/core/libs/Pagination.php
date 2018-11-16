<?php

namespace btlc\libs;


//todo урок 26 часть 2 с доработкой в уроках про фильтры
class Pagination {

    /**
     * @var текущая страница
     */
    public $currentPage;
    /**
     * @var количество записей на странице
     */
    public $perPage;
    /**
     * @var общее количество записей
     */
    public $total;
    /**
     * @var общее количество страниц
     */
    public $countPages;
    /**
     * @var string URL без параметра "page=..." со знаком & на конце URL
     */
    public $uri;


    public function __construct($page, $perPage, $total){
        $this->perPage = $perPage;
        $this->total = $total;
        $this->countPages = $this->getCountPages();
        $this->currentPage = $this->getCountPages($page);
        $this->uri = $this->getParams();

    }

    public function getHtml(){
        $back = null;// ссылка НАЗАД
        $forward = null;// ссылка ВПЕРЕД
        $startpage = null;// ссылка В НАЧАЛО
        $endpage = null;// ссылка В КОНЕЦ
        $page2left = null;// вторая страница слева
        $page1left = null;// первая страница слева
        $page2right = null;// вторая страница справа
        $page1right = null;// первая страница справа

        if($this->currentPage > 1){
            $back = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage - 1). "'>&lt;</a></li>";
        }
        if($this->currentPage < $this->countPages){
            $forward = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage + 1). "'>&gt;</a></li>";
        }
        if($this->currentPage > 3){
            $startpage = "<li><a class='nav-link' href='{$this->uri}page=1'>&laquo;</a></li>";
        }
        if($this->currentPage < ($this->countPages - 2)){
            $endpage = "<li><a class='nav-link' href='{$this->uri}page={$this->countPages}'>&raquo;</a></li>";
        }
        if($this->currentPage - 2 > 0){
            $page2left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-2). "'>" .($this->currentPage - 2). "</a></li>";
        }
        if($this->currentPage - 1 > 0){
            $page1left = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage-1). "'>" .($this->currentPage - 1). "</a></li>";
        }
        if($this->currentPage + 1 <= $this->countPages){
            $page1right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage+1). "'>" .($this->currentPage + 1). "</a></li>";
        }
        if($this->currentPage + 2 <= $this->countPages){
            $page2right = "<li><a class='nav-link' href='{$this->uri}page=" .($this->currentPage+2). "'>" .($this->currentPage + 2). "</a></li>";
        }
        return '<ul class ="pagination">' .$startpage.$back.$page2left.$page1left.'<li class="active"><a>'.$this->currentPage.'</a></li>'.$page1right.$page2right.$forward.$endpage. '</ul>';
    }

    /**
     * @return string позволяет echo Pagination
     */
    public function __toString(){
        return $this->getHtml();
    }

    public function getCountPages(){
        return ceil($this->total / $this->perPage) ?: 1;
    }

    public function getCurrentPage($page){
        if(!$page || $page < 1){$page = 1;}
        if($page > $this->countPages){$page = $this->countPages;}
        return $page;
    }

    public function  getStart(){
        return ($this->currentPage - 1) * $this->perPage;
    }

    /**
     * @return string возвращает URL без параметра "page=..." со знаком & на конце URL
     */
    public function getParams(){
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?', $url);
        $uri = $url[0] . '?';
        if(isset($url[1]) && $url[1] != ''){
            $params = explode('&', $url[1]);
            foreach ($params as $param){
                if(!preg_match("#page=#", $param)){
                    $uri .= "{$param}&amp;";
                }
            }
        }
        return urldecode($uri);
    }
}