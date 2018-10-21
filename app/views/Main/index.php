<h1>Main Index View</h1>
<p>Это вид контроллера Main, который вставлен в шаблон DEFAULT</p>
<p><?=$name;?></p>
<p><?=$age;?></p>
<? foreach ($posts as $post):?>
    <h3><?=$post->name;?></h3>
<? endforeach;?>
