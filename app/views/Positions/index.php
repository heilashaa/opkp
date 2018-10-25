<h1>Positions</h1>
<? if($positions):?>
    <table>
        <thead>
            <tr>
                <th>position</th>
                <th>Visiable</th>
                <th>Delete</th>
                <th>Correct</th>
            </tr>
        </thead>
        <? foreach ($positions as $position):?>
            <tr>
                <td><?=$position->position?></td>
                <td><?=$position->visiable?></td>
                <td><a href="/positions/delete/?id=<?=$position->id?>">Delete</a></td>
                <td><a href="/positions/correct/?id=<?=$position->id?>">Correct</a></td>
            </tr>
        <? endforeach;?>
    </table>
<? endif;?>

<div class="block">
    <form action="/positions/add" method="post">
        Department:<br><input type="text" name="position" placeholder="position"><br>
        <input type="submit" name="submit" value="add">
    </form>
</div>

