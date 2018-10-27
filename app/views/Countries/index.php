<h1>Countries</h1>
<? if($countries):?>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>Country</th>
                <th>Note</th>
            </tr>
        </thead>
        <? foreach ($countries as $country):?>
            <tr>
                <td><a class="glyphicon glyphicon-trash" href="/countries/delete/?id=<?=$country->id?>"></a></td>
                <td><a class="glyphicon glyphicon-pencil" href="/countries/correct/?id=<?=$country->id?>"></a></td>
                <td><?=$country->country?></td>
                <td><?=$country->note?></td>
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

