<?php

namespace btlc;

use btlc\libs\Debug;

class Router {

    /**
     * @var array
     * таблица всех маршрутов
     */
    protected static $routes = [];
    /**
     * @var array
     * текущий маршрут
     */
    protected static $route = [];

    /**
     * @param $regexp
     * @param array $route
     * добавляет регулярное выражение для роутинга строки запроса
     */
    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }

    /**
     * @return array
     * возвращает все доступные маршруты
     */
    public static function getRoutes() {
        return self::$routes;
    }

    /**
     * @return array
     * возвращает текущий маршрут в строке запроса
     */
    public static function getRoute(){
        return self::$route;
    }

    /**
     * @param $url
     *принимает url, проверяет на валидность  и в случае успеха создает объект класса требуемого контроллера, передает в конструктор
     * self::route, вызывает у созданного объекта контроллера необходимый action и метод получения вида getView
     * @throws \Exception
     * страница не найдена - если введенный url не соответствует заданным параметрам
     * контроллер не найден - если нет запрашиваемого controller
     * метод не найден - если нет запрашиваемого action
     */
    public static function dispatch($url) {
        $url = self::removeQueryString($url);
        if(self::matchRoute($url)) {
            $controller = 'app\controllers\\' . self::$route['prefix'].self::$route['controller'] . 'Controller';
            if(class_exists($controller)) {
                $controllerObject = new $controller(self::$route);
                $action = self::$route['action'].'Action';
                if(method_exists($controllerObject, $action)){
                    $controllerObject->$action();
                    $controllerObject->getView();
                }else{
                    throw new \Exception("Метод $controller::$action не найден", 404);
                }
            }else{
                throw new \Exception("Контроллер $controller не найден", 404);
            }

        }else{
            throw new \Exception('Страница не найдена', 404);
        }
    }

    /**
     * @param $url
     * @return bool
     * принимает url и ищет соответствие в таблице маршрутов self::routes;
     * если не существует, возвращает false
     * если соответствует, то заполняет self::route значениями controller и action и возвращает true
     */
    protected static function matchRoute($url) {
        foreach (self::$routes as $pattern => $route) {
            if(preg_match("#{$pattern}#", $url, $matches)) {
                foreach ($matches as $k => $v) {
                    if(is_string($k)) {
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])) {
                    $route['action'] = 'index';
                }
                if(!isset($route['prefix'])) {
                    $route['prefix'] = '';
                }else{
                    $route['prefix'] .= '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                $route['action'] = self::lowerCamelCase($route['action']);
                self::$route = $route;
                return true;
            }
        }
        return false;
    }


    /**
     * @param $name
     * @return mixed возвращает строку в виде CamelCase
     */
    protected static function upperCamelCase($name) {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    /**
     * @param $name
     * @return string возвращает строку в виде camelCase
     */
    protected static function lowerCamelCase($name) {
        return lcfirst(self::upperCamelCase($name));
    }

    /**
     * @param $url
     * @return string принимает url и возвращает часть url без get параметров ?test=true&id=5
     */
    protected static function removeQueryString ($url) {

        if($url) {
            $params = explode('&', $url, 2);
            if(false === strpos($params[0], '=')) {
                return rtrim($params[0], '/');
            }else{
                return '';
            }
        }
    }

}