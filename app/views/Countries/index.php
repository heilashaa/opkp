<div class="col-6">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Добавление страны</h4>
            <form class="needs-validation" novalidate="" action="/countries/add" method="post">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Страна</label>
                        <input type="text" class="form-control" id="validationCustom01" name="country" placeholder="Введите страну" value="" required="" autocomplete="off">
                        <div class="invalid-feedback">Заполните поле</div>
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="add">Добавить</button>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-6 mt-5">
    <div class="card">
        <div class="card-body">
            <? if($countries):?>
            <h4 class="header-title">Существующие страны</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover text-center table-sm">
                        <thead class="text-uppercase bg-secondary">
                        <tr class="text-white">
                            <th scope="col">Страна</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($countries as $country):?>
                            <tr>
                                <th scope="row" class="text-left"><?=$country->country?></th>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="/countries/correct/?id=<?=$country->id?>" class="text-secondary"><i class="fa fa-edit "></i></a></li>
                                        <li><a href="/countries/delete/?id=<?=$country->id?>" class="text-secondary"><i class="ti-trash text-warning"></i></a></li>
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