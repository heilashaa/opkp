<div class="col-6">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Добавление должности</h4>
            <form class="needs-validation" novalidate="" action="/positions/add" method="post">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <label for="validationCustom01">Должность</label>
                        <input type="text" class="form-control" id="validationCustom01" name="position" placeholder="Введите должность" value="" required="">
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
<div class="col-lg-6 mt-5">
    <div class="card">
        <div class="card-body">
            <? if($positions):?>
            <h4 class="header-title">Существующие должности</h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover text-center table-sm">
                        <thead class="text-uppercase bg-secondary">
                        <tr class="text-white">
                            <th scope="col">Должность</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <? foreach ($positions as $position):?>
                            <tr>
                                <th scope="row" class="text-left"><?=$position->position?></th>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="mr-3"><a href="/positions/correct/?id=<?=$position->id?>" class="text-secondary"><i class="fa fa-edit "></i></a></li>
                                        <li><a href="/positions/delete/?id=<?=$position->id?>" class="text-secondary"><i class="ti-trash text-warning"></i></a></li>
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