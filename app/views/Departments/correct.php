<div class="col-6">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Редактирование подразделения</h4>
            <form class="needs-validation" novalidate="" action="/departments/correct/?id=<?=$departments->id;?>" method="post">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <input type="hidden" name="id" value="<?=$departments->id?>">
                        <label for="validationCustom01">Наименование подразделения</label>
                        <input type="text" class="form-control" id="validationCustom01" name="department_full" placeholder="Введите наименование подразделения" value="<?=$departments->department_full;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom02">Сокращенное наименование подразделения</label>
                        <input type="text" class="form-control" id="validationCustom02" name="department" placeholder="Введите сокращенное наименование подразделения" value="<?=$departments->department;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="Save">Сохранить</button>
                <a href="/departments" class="btn btn-secondary btn-flat">Назад</a>
            </form>
        </div>
    </div>
</div>






