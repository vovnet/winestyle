<link href="/views/layouts/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<div class="container">
    <h2>Начислить зарплату</h2>
    <?php if ($exec): ?>
        <div class="alert alert-success">
            Зарплата начислена!
        </div>
    <?php endif ?>
    <div class="row">
        <div class="col-sm-12">
            <form action="/salary" method="POST">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker2'>
                        <input type='text' class="form-control" name="date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                    <label for="prof">Профессия:</label>
                    <select class="form-control" id="prof" name="prof">
                        <?php foreach ($professions as $prof): ?>
                            <option><?= $prof['prof']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="bonus">Премия:</label>
                    <input type="number" class="form-control" id="bonus" name="bonus">
                </div>
                <input type="submit" class="btn btn-default" value="Начислить"/>
            </form>
        </div>
    </div>
</div>

<script src="/views/layouts/js/moment.js"></script>
<script src="/views/layouts/js/bootstrap.min.js"></script>
<script src="/views/layouts/js/bootstrap-datetimepicker.min.js"></script>
<script src="/views/layouts/js/common.js"></script>