<?php

namespace btlc\libs;

class HttpWorker{


    public static function redirect($http = false){
        if($http){
            $redirect = $http;
        }else{
            $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
        }
        header("Location: $redirect");
        exit;
    }
}