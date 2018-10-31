<div class="col-6">
    <div class="card mt-5">
        <div class="card-body">
            <h4 class="header-title">Positions correct</h4>
            <form class="needs-validation" novalidate="" action="/positions/correct/?id=<?=$positions->id;?>" method="post">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <input type="hidden" name="id" value="<?=$positions->id?>">
                        <label for="validationCustom01">Position</label>
                        <input type="text" class="form-control" id="validationCustom01" name="position" placeholder="position" value="<?=$positions->position;?>" required="">
                        <div class="valid-feedback">
                            ok
                        </div>
                        <div class="invalid-feedback">
                            Заполните поле
                        </div>
                    </div>
                </div>
                <button name="submit" type="submit" class="btn btn-primary btn-flat btn-warning" value="Save">Save</button>
                <a href="/positions" class="btn btn-secondary btn-flat">Back</a>
            </form>
        </div>
    </div>
</div>






