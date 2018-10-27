<h1>Positions</h1>
<? if($positions):?>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>position</th>
            </tr>
        </thead>
        <? foreach ($positions as $position):?>
            <tr>
                <td><a class="glyphicon glyphicon-trash" href="/positions/delete/?id=<?=$position->id?>"></a></td>
                <td><a class="glyphicon glyphicon-pencil" href="/positions/correct/?id=<?=$position->id?>"></a></td>
                <td><?=$position->position?></td>
            </tr>
        <? endforeach;?>
    </table>
<? endif;?>

<div class="block">
    <form action="/positions/add" method="post">
        Position:<br><input type="text" name="position" placeholder="position"><br>
        <input type="submit" name="submit" value="add">
    </form>
</div>

