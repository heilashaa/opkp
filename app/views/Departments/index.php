<h1>Departments</h1>
<? if($departments):?>
    <table class="table">
        <thead>
            <tr>
                <th></th>
                <th></th>
                <th>department</th>
                <th>department_full</th>
                <th>Note</th>
            </tr>
        </thead>
        <? foreach ($departments as $department):?>
            <tr>
                <td><a class="glyphicon glyphicon-trash" href="/departments/delete/?id=<?=$department->id?>"></a></td>
                <td><a class="glyphicon glyphicon-pencil" href="/departments/correct/?id=<?=$department->id?>"></a></td>
                <td><?=$department->department?></td>
                <td><?=$department->department_full?></td>
                <td><?=$department->note?></td>
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

