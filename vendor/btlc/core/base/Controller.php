<?php

namespace btlc\base;

abstract class Controller {

    protected $route;
    protected $controller;
    protected $action;
    protected $model;
    protected $view;
    protected $prefix;
    protected $layout;
    protected $data = [];
    protected $meta = ['title' =>'', 'desc' => '', 'keywords' => ''];

    public function __construct($route) {
        $this->route = $route;
        $this->controller = $route['controller'];
        $this->action = $route['action'];
        $this->model = $route['controller'];
        $this->view = $route['action'];
        $this->prefix = $route['prefix'];
    }

    public function getView() {
        $viewObject = new View($this->route, $this->layout, $this->view, $this->meta);
        $viewObject->render($this->data);
    }

    public function set($data) {//todo на setData
        $this->data = $data;
    }

    public function setMeta($title = '', $desc = '', $keywords = '') {
        $this->meta['title'] = $title;
        $this->meta['desc'] = $desc;
        $this->meta['keywords'] = $keywords;
    }

    public function isAjax(){
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequests';
    }

}