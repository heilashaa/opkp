<div class="col-8">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Редактирование сотрудника</h4>
            <form class="needs-validation" novalidate="" action="/employees/correct/?id=<?=$employees->id;?>" method="post">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <input type="hidden" name="id" value="<?=$employees->id?>">
                        <label for="validationCustom02">Фамилия</label>
                        <input type="text" class="form-control" id="validationCustom02" name="employee_surname" placeholder="Введите фамилию" value="<?=$employees->employee_surname;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom01">Имя</label>
                        <input type="text" class="form-control" id="validationCustom01" name="employee_name" placeholder="Введите имя" value="<?=$employees->employee_name;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom03">Отчество</label>
                        <input type="text" class="form-control" id="validationCustom03" name="employee_middlename" placeholder="Введите отчество" value="<?=$employees->employee_middlename;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Подразделение</label>
                        <select class="custom-select" name="department" id="validationCustom04" required="">
                            <option selected value="<?=$employees->departments_id;?>"><?=$employees->departments->department;?></option>
                            <? if(isset($departments)):?>
                                <?foreach ($departments as $department):?>
                                    <? if($department->id != $employees->departments_id):?>
                                        <option value="<?=$department->id;?>"><?=$department->department;?></option>
                                    <? endif;?>
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
                            <option selected value="<?=$employees->positions_id;?>"><?=$employees->positions->position;?></option>
                            <? if(isset($positions)):?>
                                <?foreach ($positions as $position):?>
                                    <? if($position->id != $employees->positions_id):?>
                                        <option value="<?=$position->id;?>"><?=$position->position;?></option>
                                    <? endif;?>
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
                        <input type="email" class="form-control" id="validationCustom06" name="email" placeholder="Введите email" value="<?=$employees->email;?>" autocomplete="off">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom07">Моблильный телефон</label>
                        <input type="text" class="form-control" id="validationCustom07" name="mobil_phone" placeholder="Введите мобильный телефон" value="<?=$employees->mobil_phone;?>" autocomplete="off">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationCustom08">Рабочий телефон</label>
                        <input type="text" class="form-control" id="validationCustom08" name="work_phone" placeholder="Введите рабочий телефон" value="<?=$employees->work_phone;?>" autocomplete="off">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom09">Пароль для входя</label>
                        <input type="text" class="form-control" id="validationCustom09" name="password" placeholder="Введите пароль" value="<?=$employees->password;?>" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom10">Вид доступа</label>
                        <select class="custom-select" name="access" id="validationCustom10" required="">
                            <option selected value="<?=$employees->accesses_id;?>"><?=$employees->accesses->access;?></option>
                            <? if(isset($accesses)):?>
                                <?foreach ($accesses as $access):?>
                                    <? if($access->id != $employees->accesses_id):?>
                                        <option value="<?=$access->id;?>"><?=$access->access;?></option>
                                    <? endif;?>
                                <? endforeach;?>
                            <? else:?>
                                <option disabled >нет записей</option>
                            <? endif;?>
                        </select>
                        <div class="invalid-feedback">Выберите значение</div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom11">День рождения</label>
                        <input class="form-control" type="date" value="<? if($employees->birthday !=0):?><?=date('Y-m-d',$employees->birthday);?><? endif;?>" id="validationCustom11" autocomplete="off" name="birthday">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom12">Дата приема на работу</label>
                        <input class="form-control" type="date" value="<? if($employees->employment_date !=0):?><?=date('Y-m-d',$employees->employment_date);?><? endif;?>" id="validationCustom12" autocomplete="off" name="employment_date">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom13">Образование</label>
                        <input type="text" class="form-control" id="validationCustom13" name="education" placeholder="Образование" value="<?=$employees->education;?>" autocomplete="off">
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="save">Сохранить</button>
                <a href="/employees" class="btn btn-secondary btn-flat">Назад</a>
            </form>
        </div>
    </div>
</div>




