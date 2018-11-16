<div class="col-8">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Добавление сотрудника</h4>
            <form class="needs-validation" novalidate="" action="/employees/add" method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Имя</label>
                        <input type="text" class="form-control" id="validationCustom01" name="employee_name" placeholder="Введите имя" value="" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Фамилия</label>
                        <input type="text" class="form-control" id="validationCustom02" name="employee_surname" placeholder="Введите фамилию" value="" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Отчество</label>
                        <input type="text" class="form-control" id="validationCustom03" name="employee_middlename" placeholder="Введите отчество" value="" required="">
                        <div class="valid-feedback">ok</div>
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Подразделения</label>
                        <input type="text" class="form-control" id="validationCustom04" name="department" placeholder="Выберите подразделение" value="" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="validationCustom05">Должность</label>
                        <input type="text" class="form-control" id="validationCustom05" name="position" placeholder="Выберите должность" value="" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom06">Email</label>
                        <input type="text" class="form-control" id="validationCustom06" name="email" placeholder="Введите email" value="" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom07">Моблильный телефон</label>
                        <input type="text" class="form-control" id="validationCustom07" name="mobil_phone" placeholder="Введите мобильный телефон" value="" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom08">Рабочий телефон</label>
                        <input type="text" class="form-control" id="validationCustom08" name="work_phone" placeholder="Введите рабочий телефон" value="" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom09">Пароль для входя</label>
                        <input type="text" class="form-control" id="validationCustom09" name="password" placeholder="Введите пароль" value="" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom10">Вид доступа</label>
                        <input type="text" class="form-control" id="validationCustom10" name="accesses" placeholder="Введите вид доступа" value="" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="add">Добавить</button>
            </form>
        </div>
    </div>
</div>


<div class="input-group mb-3">
    <select class="js-example-basic-single custom-select" name="state">
        <option value="AL">Alabama</option>
        <option value="WY">Wyoming</option>
    </select>
</div>








<div class="col-lg-8 mt-5">
    <div class="card">
        <div class="card-body">
            <? if($departments):?>
            <h4 class="header-title">Существующие подразделения</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover text-center table-sm">
                        <thead class="text-uppercase bg-secondary">
                        <tr class="text-white">
                            <th scope="col">Наименование подразделения</th>
                            <th scope="col">Сокращенное наименование подразделения</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($departments as $department):?>
                            <tr>
                                <th scope="row" class="text-left"><?=$department->department_full?></th>
                                <td scope="row" class="text-left"><?=$department->department?></td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="/departments/correct/?id=<?=$department->id?>" class="text-secondary"><i class="fa fa-edit "></i></a></li>
                                        <li><a href="/departments/delete/?id=<?=$department->id?>" class="text-secondary"><i class="ti-trash text-warning"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                        <? endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
            <? else:?>
                <h2>Нет записей для отображения</h2>
            <? endif;?>
        </div>
    </div>
</div>