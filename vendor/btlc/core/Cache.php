<?php

namespace btlc;

/**
 * Class Cache
 * @package btlc
 */
class Cache {//lesson 13 part 1

    /**
     * @param $key назчание файла кэша, которое будет переименовано через md5
     * @param $data данный, которые нелбходимо закэшировать
     * @param int $seconds время, на которое будет создан кэш
     * @return bool
     */
    public static function set($key, $data, $seconds = 3600){
        if($seconds){
            $content['data'] = $data;
            $content['end_time'] = time() + $seconds;
            if(file_put_contents(CACHE . '/' . $key . md5($key) . '.txt', serialize($content))){
                return true;
            }
        }
        return false;
    }

    /**
     * @param $key назчание файла кэша
     * @return bool возвращает false если файл кэша отсутствует или просрочен, или содержимое кэша
     */
    public static function get($key){
        $file = CACHE . '/' . $key . md5($key) . '.txt';
        if(file_exists($file)){
            $content = unserialize(file_get_contents($file));
            if(time() <= $content['end_time']){
                return $content['data'];
            }
            unlink($file);
        }
        return false;
    }

    /**
     * @param $key
     */
    public static function delete($key){
        $file = CACHE . '/' . md5($key) . '.txt';
        if(file_exists($file)){
            unlink($file);
        }
    }
}