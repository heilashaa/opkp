<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <?=$this->getMeta();?>
</head>
<body>
<div class="container-fluid block">
    <div class="row">
        <div class="header block">
            <p><h1>OPKP</h1></p>
            <p><h4>BELINTERTRANS - Transportation logistic center of Belarussion Railways</h4></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 block">
            <ul>
                <li><a href="#">MAIN</a></li>
                <li><a href="#">REQUESTS</a></li>
                <li><a href="#">CLIENTS</a></li>
                <li><a href="#">AGENTS</a></li>
                <li><a href="#">CLIENTS WORK</a></li>
                <li><a href="#">DEPARTMENT</a></li>
            </ul>
        </div>
        <div class="col-md-10 block">
            <h1>Это шаблон default</h1>
            <?= $content; ?>
        </div>
    </div>
    <div class="row">
        <div class="footer block">
            <h5>Все права защищены</h5>
        </div>
    </div>
    <? if(DEBUG):?>
    <!-- Вывод запросов RedBeanPHP в виде Debug -->
    <div class="row">
        <div class="debug-panel block">
            <p class="alert-danger">
                <?php
                $logs = \R::getDatabaseAdapter()->getDatabase()->getLogger();
                btlc\libs\Debug::arr($logs->grep('SELECT'));
                ?>
            </p>
        </div>
    </div>
    <?endif;?>
</div>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
