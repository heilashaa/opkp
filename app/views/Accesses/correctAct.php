<div class="col-6">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Редактирование описания допустимых действий в приложении</h4>
            <form class="needs-validation" novalidate="01" action="/accesses/correct-act/?id=<?=$actions->id;?>" method="post">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <input type="hidden" name="id" value="<?=$actions->id?>">
                        <label>Контроллер</label>
                        <input type="text" class="form-control" name="controller" value="<?=$actions->controller;?>" disabled>
                        <label>Экшен</label>
                        <input type="text" class="form-control" name="action" value="<?=$actions->action;?>" disabled>
                        <label for="validationCustom01">Описание действия</label>
                        <input type="text" class="form-control" id="validationCustom01" name="description" placeholder="Введите описание действия" value="<?=$actions->description;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="Save">Сохранить</button>
                <a href="/accesses" class="btn btn-secondary btn-flat">Назад</a>
            </form>
        </div>
    </div>
</div>