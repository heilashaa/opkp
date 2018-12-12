<div class="col-12">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Провайдеры</h4>
            <form class="needs-validation" novalidate="" action="/providers/add" method="post">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom02">Провайдер</label>
                        <input type="text" class="form-control" id="validationCustom02" name="provider" placeholder="Введите провайдера" value="" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="validationCustom01">Полное наименование провайдера</label>
                        <input type="text" class="form-control" id="validationCustom01" name="provider_full" placeholder="Введите полное наименование провайдера" value="" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom05">Страна</label>
                        <select class="custom-select" name="country" id="validationCustom05" required="">
                            <option selected disabled value="">Страна</option>
                            <? if(isset($countries)):?>
                                <?foreach ($countries as $country):?>
                                    <option value="<?=$country->id;?>"><?=$country->country;?></option>
                                <? endforeach;?>
                            <? else:?>
                                <option disabled >нет записей</option>
                            <? endif;?>
                        </select>
                        <div class="invalid-feedback">Выберите значение</div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom06">Исполнитель</label>
                        <select class="custom-select" name="employee" id="validationCustom06" required="">
                            <option selected disabled value="">Исполнитель</option>
                            <? if(isset($employees)):?>
                                <?foreach ($employees as $employee):?>
                                    <option value="<?=$employee->id;?>"><?=$employee->employee_surname;?></option>
                                <? endforeach;?>
                            <? else:?>
                                <option disabled >нет записей</option>
                            <? endif;?>
                        </select>
                        <div class="invalid-feedback">Выберите значение</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom03">Договор</label>
                        <input type="text" class="form-control" id="validationCustom03" name="contract" placeholder="Введите номер договора" value="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom04">Дата заключения договора</label>
                        <input class="form-control" type="date" value="" id="validationCustom04" autocomplete="off" name="contract_date" disabled required="">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label for="validationCustom07">Условия оплаты</label>
                        <input type="text" class="form-control" id="validationCustom07" name="term_of_payment" placeholder="Введите условия оплаты" value="" autocomplete="off" disabled required="">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom08">Специализация работы</label>
                        <input type="text" class="form-control" id="validationCustom08" name="specialization" placeholder="Введите специализацию работы, например жд тариф БЧ, РЖД ..." value="" autocomplete="off">
                    </div>
                </div>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Примечание</span>
                    </div>
                    <textarea name="note" class="form-control" aria-label="With textarea"></textarea>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="add">Добавить</button>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-12 mt-5">
    <div class="card">
        <div class="card-body">
            <? if(isset($providers)):?>
            <h4 class="header-title">Существующие провайдеры</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover text-center table-sm">
                        <thead class="text-uppercase bg-secondary">
                        <tr class="text-white">
                            <th scope="col">Провайдер</th>
                            <th scope="col">Полное наименование провайдера</th>
                            <th scope="col">Страна</th>
                            <th scope="col">Договор</th>
                            <th scope="col">Дата заключения договора</th>
                            <th scope="col">Исполнитель</th>
                            <th scope="col">Условия оплаты</th>
                            <th scope="col">Специализация</th>
                            <th scope="col">Примечание</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($providers as $provider):?>
                            <tr>
                                <td scope="row" class="text-left"><?=$provider->provider;?></td>
                                <td scope="row" class="text-left"><?=$provider->provider_full;?></td>
                                <td scope="row" class="text-left"><?=$provider->countries->country;?></td>
                                <? if($provider->contract != ''):?>
                                    <td scope="row" class="text-left"><?=$provider->contract;?></td>
                                    <td scope="row" class="text-left"><?=date('d-m-Y', $provider->contract_date);?></td>
                                    <td scope="row" class="text-left"><?=$provider->employees->employee_surname;?></td>
                                    <td scope="row" class="text-left"><?=$provider->term_of_payment;?></td>
                                <? else:?>
                                    <td scope="row" class="text-left">-</td>
                                    <td scope="row" class="text-left">-</td>
                                    <td scope="row" class="text-left">-</td>
                                    <td scope="row" class="text-left">-</td>
                                <? endif;?>
                                <td scope="row" class="text-left"><?=$provider->specialization;?></td>
                                <td scope="row" class="text-left"><?=$provider->note;?></td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="/providers/correct/?id=<?=$provider->id?>" class="text-secondary"><i class="fa fa-info "></i></a></li>
                                        <li><a href="/providers/delete/?id=<?=$provider->id?>" class="text-secondary"><i class="ti-trash text-warning"></i></a></li>
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