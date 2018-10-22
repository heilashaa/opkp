<h1>Countries</h1>
<? if($countries):?>
    <table>
        <thead>
            <tr>
                <th>Country</th>
                <th>Note</th>
                <th>Visiable</th>
                <th>Delete</th>
                <th>Correct</th>
            </tr>
        </thead>
        <? foreach ($countries as $country):?>
            <tr>
                <td><?=$country->country?></td>
                <td><?=$country->note?></td>
                <td><?=$country->visiable?></td>
                <td><a href="/countries/delete/?id=<?=$country->id?>">Delete</a></td>
                <td><a href="/countries/correct/?id=<?=$country->id?>">Correct</a></td>
            </tr>
        <? endforeach;?>
    </table>
<? endif;?>

<div class="block">
    <form action="/countries/add" method="post">
        Country:<br><input type="text" name="country" placeholder="country"><br>
        Note:<br><input type="text" name="note" placeholder="note"><br>
        <input type="submit" name="submit" value="add">
    </form>
</div>

