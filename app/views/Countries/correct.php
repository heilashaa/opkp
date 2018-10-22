<h1>Countries correct</h1>
<div class="block">
    <form action="/countries/correct/?id=<?=$countries->id;?>" method="post">
        <input type="hidden" name="id" value="<?=$countries->id?>">
        Country:<br><input type="text" name="country" placeholder="country" value="<?=$countries->country;?>"><br>
        Note:<br><input type="text" name="note" placeholder="note" value="<?=$countries->note;?>"><br>
        <input type="submit" name="submit" value="Save"><br>
        <a href="/countries">Back</a>
    </form>
</div>

