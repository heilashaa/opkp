<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/jquery.dataTables.min.css" rel="stylesheet">
    <?=$this->getMeta();?>
</head>
<body>
<div class="container-fluid block">
    <div class="row">
        <div class="header block">
            <p><h1>OPKP</h1></p>
            <p><h4>BELINTERTRANS</h4></p>
        </div>
    </div>
    <? if(isset($_SESSION['message'])):?>
    <div class="row message block">
        <?=$_SESSION['message'];?>
        <? unset($_SESSION['message']);?>
    </div>
    <? endif;?>
    <div class="row user block">
        User block
    </div>
    <div class="row">
        <div class="col-md-2 block menu">
            <?php new \app\widgets\menu\Menu([
                'table' => 'test',
            ]); ?>
            <ul>
                <li><a href="/">MAIN</a></li>
                <li><a href="#">REQUESTS</a></li>
                <li><a href="#">CLIENTS</a></li>
                <li><a href="providers">Providers</a></li>
                <li><a href="#">CLIENTS WORK</a></li>
                <li>Directories
                    <ul>
                        <li><a href="/countries">Counties</a></li>
                        <li><a href="/departments">Departments</a></li>
                        <li><a href="/positions">Positions</a></li>
                        <li><a href="#">Employees</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-md-10 block content">
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
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.dataTables.min.js"></script>
<script  type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            "language": {
                "url": "/js/russian.json"
            }
        } );
    } );
</script>
</body>
</html>
