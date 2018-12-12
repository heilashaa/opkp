<div class="col-8">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Добавление сотрудника</h4>
            <form class="needs-validation" novalidate="" action="/employees/add" method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom02">Фамилия</label>
                        <input type="text" class="form-control" id="validationCustom02" name="employee_surname" placeholder="Введите фамилию" value="" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Имя</label>
                        <input type="text" class="form-control" id="validationCustom01" name="employee_name" placeholder="Введите имя" value="" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Отчество</label>
                        <input type="text" class="form-control" id="validationCustom03" name="employee_middlename" placeholder="Введите отчество" value="" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Подразделение</label>
                        <select class="custom-select" name="department" id="validationCustom04" required="">
                            <option selected disabled value="">Подразделение</option>
                            <? if(isset($departments)):?>
                                <?foreach ($departments as $department):?>
                                    <option value="<?=$department->id;?>"><?=$department->department;?></option>
                                <? endforeach;?>
                            <? else:?>
                                <option disabled >нет записей</option>
                            <? endif;?>
                        </select>
                        <div class="invalid-feedback">Выберите значение</div>
                    </div>
                    <div class="col-md-9 mb-3">
                        <label for="validationCustom05">Должность</label>
                        <select class="custom-select" name="position" id="validationCustom05" required="">
                            <option selected disabled value="">Должность</option>
                            <? if(isset($positions)):?>
                            <?foreach ($positions as $position):?>
                                <option value="<?=$position->id;?>"><?=$position->position;?></option>
                            <? endforeach;?>
                            <? else:?>
                                <option disabled >нет записей</option>
                            <? endif;?>
                        </select>
                        <div class="invalid-feedback">Выберите значение</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom06">Email</label>
                        <input type="email" class="form-control" id="validationCustom06" name="email" placeholder="Введите email" value="" autocomplete="off">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom07">Мобилильный телефон</label>
                        <input type="text" class="form-control" id="validationCustom07" name="mobil_phone" placeholder="Введите мобильный телефон" value="" autocomplete="off">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom08">Рабочий телефон</label>
                        <input type="text" class="form-control" id="validationCustom08" name="work_phone" placeholder="Введите рабочий телефон" value="" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom09">Пароль для входа</label>
                        <input type="text" class="form-control" id="validationCustom09" name="password" placeholder="Введите пароль" value="" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom10">Вид доступа</label>
                        <select class="custom-select" name="access" id="validationCustom10" required="">
                            <option selected disabled value="">Вид доступа</option>
                            <? if(isset($accesses)):?>
                                <?foreach ($accesses as $access):?>
                                    <option value="<?=$access->id;?>"><?=$access->access;?></option>
                                <? endforeach;?>
                            <? else:?>
                                <option disabled >нет записей</option>
                            <? endif;?>
                        </select>
                        <div class="invalid-feedback">Выберите значение</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom11">День рождения</label>
                        <input class="form-control" type="date" value="" id="validationCustom11" autocomplete="off" name="birthday">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom12">Дата приема на работу</label>
                        <input class="form-control" type="date" value="" id="validationCustom12" autocomplete="off" name="employment_date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom13">Образование</label>
                        <input type="text" class="form-control" id="validationCustom13" name="education" placeholder="Образование" value="" autocomplete="off">
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="add">Добавить</button>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <? if($employees):?>
            <h4 class="header-title">Существующие подразделения</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover text-center table-sm">
                        <thead class="text-uppercase bg-secondary">
                        <tr class="text-white">
                            <th scope="col">Фамилия</th>
                            <th scope="col">Имя</th>
                            <th scope="col">Отчество</th>
                            <th scope="col">Подразделение</th>
                            <th scope="col">Должность</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Мобильный телефон</th>
                            <th scope="col">Рабочий телефон</th>
                            <th scope="col">Пароль</th>
                            <th scope="col">Доступ</th>
                            <th scope="col">День рождения</th>
                            <th scope="col">Дата приема на работу</th>
                            <th scope="col">Образование</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($employees as $employee):?>
                            <tr>
                                <td scope="row" class="text-left"><?=$employee->employee_surname;?></td>
                                <td scope="row" class="text-left"><?=$employee->employee_name;?></td>
                                <td scope="row" class="text-left"><?=$employee->employee_middlename;?></td>
                                <td scope="row" class="text-left"><?=$employee->departments->department;?></td>
                                <td scope="row" class="text-left"><?=$employee->positions->position;?></td>
                                <td scope="row" class="text-left"><?=$employee->email;?></td>
                                <td scope="row" class="text-left"><?=$employee->mobil_phone;?></td>
                                <td scope="row" class="text-left"><?=$employee->work_phone;?></td>
                                <td scope="row" class="text-left"><?=$employee->password;?></td>
                                <td scope="row" class="text-left"><?=$employee->accesses->access;?></td>
                                <td scope="row" class="text-left">
                                    <? if($employee->birthday != 0):?>
                                        <?=date('d-m-Y', $employee->birthday);?>
                                    <? endif;?>
                                </td>
                                <td scope="row" class="text-left">
                                    <? if($employee->employment_date != 0):?>
                                        <?=date('d-m-Y', $employee->employment_date);?>
                                    <? endif;?>
                                </td>
                                <td scope="row" class="text-left"><?=$employee->education;?></td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="/employees/correct/?id=<?=$employee->id?>" class="text-secondary"><i class="fa fa-edit "></i></a></li>
                                        <li><a href="/employees/delete/?id=<?=$employee->id?>" class="text-secondary"><i class="ti-trash text-warning"></i></a></li>
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