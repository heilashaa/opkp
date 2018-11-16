<div class="row">
    <div class="col-12">
        <div class="card mt-5">
            <div class="card-body">
                <h4 class="header-title">Распределение доступа</h4>
                <? if($accesses):?>
                    <form action="/accesses/save-accesses" method="post">
                        <div class="single-table">
                            <div class="table-responsive">
                                <table class="table table-hover text-center table-sm">
                                    <thead class="text-uppercase bg-secondary">
                                        <tr class="text-white">
                                            <th scope="row" class="text-left">Допустимые действия</th>
                                            <? foreach ($accesses as $access):?>
                                            <th scope="row" class="text-left"><?=$access->access?></th>
                                            <? endforeach;?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <? foreach ($actions as $action):?>
                                            <tr>
                                                <th scope="row" class="text-left"><?=$action->description;?></th>
                                                <? foreach ($accesses as $access):?>
                                                    <td scope="row" class="text-left">
                                                        <div class="custom-control custom-checkbox">
                                                            <? if($access->admin == 1 && \app\controllers\AccessesController::isSharedAdmin($action->id, $access->id)):?>
                                                                <input type="hidden" name="<?=$action->id;?>-<?=$access->id;?>">
                                                                <input name="<?=$action->id;?>-<?=$access->id;?>" type="checkbox" checked disabled class="custom-control-input" id="<?=$action->id;?>-<?=$access->id;?>">
                                                                <label class="custom-control-label" for="<?=$action->id;?>-<?=$access->id;?>"></label>
                                                            <? elseif($access->admin == 1 && !\app\controllers\AccessesController::isSharedAdmin($action->id, $access->id)):?>
                                                                <input name="<?=$action->id;?>-<?=$access->id;?>" type="checkbox" class="custom-control-input" id="<?=$action->id;?>-<?=$access->id;?>">
                                                                <label class="custom-control-label" for="<?=$action->id;?>-<?=$access->id;?>"></label>
                                                                <span class="status-p bg-warning"> new</span>
                                                            <? elseif(isset($connections[$action->id][$access->access])): ?>
                                                                <input name="<?=$action->id;?>-<?=$access->id;?>" type="checkbox" checked class="custom-control-input" id="<?=$action->id;?>-<?=$access->id;?>">
                                                                <label class="custom-control-label" for="<?=$action->id;?>-<?=$access->id;?>"></label>
                                                            <? else: ?>
                                                                <input name="<?=$action->id;?>-<?=$access->id;?>" type="checkbox" class="custom-control-input" id="<?=$action->id;?>-<?=$access->id;?>">
                                                                <label class="custom-control-label" for="<?=$action->id;?>-<?=$access->id;?>"></label>
                                                            <? endif; ?>
                                                        </div>
                                                    </td>
                                                <? endforeach;?>
                                            </tr>
                                        <? endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="save">Сохранить</button>
                    </form>
                <? else:?>
                    <h2>Нет записей для отображения</h2>
                <? endif;?>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="header-title">Добавить вид доступа</h4>
                        <form class="needs-validation" novalidate="" action="/accesses/add" method="post">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label for="validationCustom01">Вид доступа</label>
                                    <input type="text" class="form-control" id="validationCustom01" name="access" placeholder="Введите вид доступа" value="" required="" autocomplete="off">
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
                                    <input type="checkbox" class="custom-control-input" id="01" name="admin">
                                    <label class="custom-control-label" for="01">присвоить максимальный доступ?</label>
                                </div>
                            </div>
                            <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="add">Добавить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-body">
                        <? if($accesses):?>
                            <h4 class="header-title">Существующие виды доступа</h4>
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover text-center table-sm">
                                        <thead class="text-uppercase bg-secondary">
                                        <tr class="text-white">
                                            <th scope="col">Вид доступа</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <? foreach ($accesses as $access):?>
                                            <tr>
                                                <th scope="row" class="text-left">
                                                    <?=$access->access?>
                                                    <? if($access->admin == 1):?>
                                                        <span class="status-p bg-warning"> admin</span>
                                                    <? endif;?>
                                                </th>
                                                <td>
                                                    <ul class="d-flex justify-content-center">
                                                        <li class="mr-3"><a href="/accesses/correct/?id=<?=$access->id?>" class="text-secondary"><i class="fa fa-edit "></i></a></li>
                                                        <li><a href="/accesses/delete/?id=<?=$access->id?>" class="text-secondary"><i class="ti-trash text-warning"></i></a></li>
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
        </div>
    </div>
    <div class="col-lg-8 mt-5">
        <div class="card">
            <div class="card-body">
                <? if($actions):?>
                    <h4 class="header-title">Допустимые действия в приложении</h4>
                    <div class="single-table">
                        <div class="table-responsive">
                            <table class="table table-hover text-center table-sm">
                                <thead class="text-uppercase bg-secondary">
                                <tr class="text-white">
                                    <th scope="col">Описание</th>
                                    <th scope="col">Контроллер</th>
                                    <th scope="col">Экшен</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <? foreach ($actions as $action):?>
                                    <tr>
                                        <? if($action->description != ''):?>
                                            <th scope="row" class="text-left"><?=$action->description;?></th>
                                        <? else:?>
                                            <th scope="row" class="text-left"><span class="status-p bg-warning"> need correct</span></th>
                                        <? endif;?>
                                        <th scope="row" class="text-left"><?=$action->controller;?></th>
                                        <th scope="row" class="text-left"><?=$action->action;?></th>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                                <li class="mr-3"><a href="/accesses/correct-act/?id=<?=$action->id;?>" class="text-secondary"><i class="fa fa-edit "></i></a></li>
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
</div>