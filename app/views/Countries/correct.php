<div class="col-6">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Редактирование стран</h4>
            <form class="needs-validation" novalidate="" action="/countries/correct/?id=<?=$countries->id;?>" method="post">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <input type="hidden" name="id" value="<?=$countries->id?>">
                        <label for="validationCustom01">Страна</label>
                        <input type="text" class="form-control" id="validationCustom01" name="country" placeholder="Введите страну" value="<?=$countries->country;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="Save">Сохранить</button>
                <a href="/countries" class="btn btn-secondary btn-flat">Назад</a>
            </form>
        </div>
    </div>
</div>






