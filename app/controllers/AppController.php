<?php

namespace app\controllers;

use app\models\AppModel;
use btlc\base\Controller;

class AppController extends Controller {
    public function __construct($route) {
        parent::__construct($route);
        new AppModel();//todo при добавлении, проверять наличие записей в invisible
    }
}