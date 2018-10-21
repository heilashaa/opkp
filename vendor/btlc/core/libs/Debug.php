<?php

namespace btlc\libs;

class Debug {

    public static function arr($arr){
        echo '<pre>'. print_r($arr, true) .'</pre>';
    }

}