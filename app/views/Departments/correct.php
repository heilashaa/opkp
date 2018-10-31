<h1>Departments correct</h1>
<div class="block">
    <form action="/departments/correct/?id=<?=$departments->id;?>" method="post">
        <input type="hidden" name="id" value="<?=$departments->id?>">
        Department:<br><input type="text" name="department" placeholder="department" value="<?=$departments->department;?>"><br>
        Department_full:<br><input type="text" name="department_full" placeholder="department_full" value="<?=$departments->department_full;?>"><br>
        Note:<br><input type="text" name="note" placeholder="note" value="<?=$departments->note;?>"><br>
        <input type="submit" name="submit" value="Save"><br>
        <a href="/departments">Back</a>
    </form>
</div>
