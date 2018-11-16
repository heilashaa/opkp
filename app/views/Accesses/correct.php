<div class="col-6">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Редактирование вида доступа</h4>
            <form class="needs-validation" novalidate="01" action="/accesses/correct/?id=<?=$accesses->id;?>" method="post">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <input type="hidden" name="id" value="<?=$accesses->id?>">
                        <label for="validationCustom01">Вид доступа</label>
                        <input type="text" class="form-control" id="validationCustom01" name="access" placeholder="Введите вид доступа" value="<?=$accesses->access;?>" required=""  autocomplete="off">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="mb-3 custom-control custom-checkbox">
                        <? if ($accesses->admin == 1):?>
                            <input type="checkbox" checked class="custom-control-input" id="01" name="admin">
                        <? else:?>
                            <input type="checkbox" class="custom-control-input" id="01" name="admin">
                        <? endif;?>
                        <label class="custom-control-label" for="01">присвоить максимальный доступ?</label>
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="Save">Сохранить</button>
                <a href="/accesses" class="btn btn-secondary btn-flat">Назад</a>
            </form>
        </div>
    </div>
</div>






