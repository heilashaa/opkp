<?php

namespace btlc;

/**
 * Class ErrorHandler
 * @package btlc
 * клас для обработки ошибок /Exceptions/
 */
class ErrorHandler { //todo расширить по урокам  "Написание собственного фреймворка на PHP"
    public function __construct() {
        if(DEBUG) {
            error_reporting(-1);
        }else{
            error_reporting(0);
        }
        set_exception_handler([$this, 'exceptionHandler']); //метод для exception выброшенных вне try, catch
    }

    /**
     * @param \Exception $e
     * метод, который будет вызван при выбросе exception вне try, catch
     */
    public function exceptionHandler(\Exception $e) { //todo в уроке просто $e
        $this->logErrors($e->getMessage(), $e->getFile(), $e->getLine());
        $this->displayError('исключение', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
    }

    /**
     * @param string $message
     * @param string $file
     * @param string $line
     * метод записи лога ошибок
     */
    protected function logErrors($message = '', $file = '', $line = '') {
        error_log("[" . date('Y-m-d H:i:s') . "] текст ошибки: {$message} | файл: {$file} | строка : {$line}\n
        ", 3, ROOT . '/tmp/errors.log');
    }

    /**
     * @param $errno
     * @param $errstr
     * @param $errfile
     * @param $errline
     * @param int $responce
     * метод отображения ошибок
     */
    protected function displayError($errno, $errstr, $errfile, $errline, $responce = 404) {
        http_response_code($responce);
        if($responce == 404 && !DEBUG) {
            require WWW. '/errors/404error.php';
            die;
        }
        if(DEBUG) {
            require WWW. '/errors/development.php';
        }else{
            require WWW. '/errors/production.php';
        }
        die;
    }

}