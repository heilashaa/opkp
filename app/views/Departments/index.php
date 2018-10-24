<h1>Departments</h1>
<? if($departments):?>
    <table>
        <thead>
            <tr>
                <th>department</th>
                <th>department_full</th>
                <th>Note</th>
                <th>Visiable</th>
                <th>Delete</th>
                <th>Correct</th>
            </tr>
        </thead>
        <? foreach ($departments as $department):?>
            <tr>
                <td><?=$department->department?></td>
                <td><?=$department->department_full?></td>
                <td><?=$department->note?></td>
                <td><?=$department->visiable?></td>
                <td><a href="/departments/delete/?id=<?=$department->id?>">Delete</a></td>
                <td><a href="/departments/correct/?id=<?=$department->id?>">Correct</a></td>
            </tr>
        <? endforeach;?>
    </table>
<? endif;?>

<div class="block">
    <form action="/departments/add" method="post">
        Department:<br><input type="text" name="department" placeholder="department"><br>
        Department_full:<br><input type="text" name="department_full" placeholder="department_full"><br>
        Note:<br><input type="text" name="note" placeholder="note"><br>
        <input type="submit" name="submit" value="add">
    </form>
</div>

