<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>
    <h1>Произошла ошибка (приложение работает в режиме development)</h1>
    <p><b>Код ошибки: </b><?=$errno?></p>
    <p><b>Текст ошибки: </b><?=$errstr?></p>
    <p><b>Файл, в котором произошла ошибка: </b><?=$errfile?></p>
    <p><b>Строка, в которой произошла ошибка: </b><?=$errline?></p>
    <p><a href="<?=PATH?>">На главную страницу</a></p>
</body>
</html>