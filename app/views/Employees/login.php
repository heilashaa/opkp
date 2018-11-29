<div class="login-area login-bg">
    <div class="container">
        <? if(isset($_SESSION['msg'])):?>
            <div class="alert-dismiss mt-0">
                <div class="alert alert-<?=$_SESSION['msg']['result'];?> alert-dismissible fade show" role="alert">
                    <strong><i class="fa fa-exclamation-circle"></i> Attention!</strong> <?=$_SESSION['msg']['text'];?>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span class="fa fa-times"></span></button>
                </div>
            </div>
            <? unset($_SESSION['msg']);?>
        <? endif;?>
        <div class="login-box ptb--100">
            <form action="login" method="post">
                <div class="login-form-head">
                    <h4>БТЛЦ  |  ОПКП</h4>
                    <p>Добрый день, выполните вход для получения доступа и начала работы</p>
                </div>
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="1">Фамилия</label>
                        <input type="text" id="1" name="employee_surname" autocomplete="off">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-gp">
                        <label for="2">Имя</label>
                        <input type="text" id="2" name="employee_name" autocomplete="off">
                        <i class="fa fa-user"></i>
                    </div>
                    <div class="form-gp">
                        <label for="3">Пароль</label>
                        <input type="password" id="3" name="password">
                        <i class="ti-lock"></i>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" type="submit" name="submit">Вход <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>