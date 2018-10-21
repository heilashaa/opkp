<?php

namespace btlc;

/**
 * Trait TSingletone
 * @package btlc
 * основав шаблона singleton
 */
trait TSingletone {

    private static $instance;

    public static function instance() {
        if(self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

}