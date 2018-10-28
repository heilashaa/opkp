<?php //$parent = isset($category['childs']);?>
<li>
    <a href="/<?=$category['link']; ?>"><?= $category['title'];?></a>
    <? if(isset($category['childs'])):?>
        <ul>
            <?=$this->getMenuHtml($category['childs']);?>
        </ul>
    <? endif; ?>
</li>