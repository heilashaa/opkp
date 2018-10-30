<?php

define("DEBUG", 1);//режим разработки (1) и продакшен (0)
define("ROOT", dirname(__DIR__));
define("WWW", ROOT.'/public');
define("APP", ROOT.'/app');
define("CORE", ROOT.'/vendor/btlc/core');
define("LIBS", ROOT.'/vendor/btlc/core/libs');
define("CACHE", ROOT.'/tmp/cache');
define("CONF", ROOT.'/config');
define("LAYOUT", 'btlc');
define("PATH", "http://{$_SERVER['HTTP_HOST']}");
define("ADMIN", PATH.'/admin');

require_once ROOT. '/vendor/autoload.php';
