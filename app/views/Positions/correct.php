<h1>Positions correct</h1>
<div class="block">
    <form action="/positions/correct/?id=<?=$positions->id;?>" method="post">
        <input type="hidden" name="id" value="<?=$positions->id?>">
        Position:<br><input type="text" name="position" placeholder="position" value="<?=$positions->position;?>"><br>
        <input type="submit" name="submit" value="Save"><br>
        <a href="/positions">Back</a>
    </form>
</div>

