<link href="/views/layouts/css/bootstrap-datetimepicker.min.css" rel="stylesheet">
<div class="container" xmlns="http://www.w3.org/1999/html">
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="container">
                                <div class="row">
                                    <div class='col-sm-5'>
                                        <div class="form-group">
                                            <div class='input-group date' id='datetimepicker1'>
                                                <input type='text' class="form-control"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Фото</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Должность</th>
                    <th>Зарплата</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($workers as $worker): ?>
                    <tr id="worker">
                        <td><img data-worker-id="<?= $worker['id']; ?>" class="img-circle"
                                 src="<?= $worker['thumb']; ?>"
                                 data-toggle="modal" data-target="#modalWorker"></td>
                        <td><?= $worker['firstname']; ?></td>
                        <td><?= $worker['lastname']; ?></td>
                        <td><?= $worker['prof']; ?></td>
                        <td><?= $worker['salary']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<!-- Modal -->
<div id="modalWorker" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Просмотр профиля</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-7">
                        <img id="worker-photo" src="" class="img-rounded" width="300" height="300">
                    </div>
                    <div class="col-xs-5">
                        <div id="fname-lname"><h3></h3></div>
                        <div id="w-prof"><h4></h4></div>
                        <div id="w-salary"><h4></h4></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script src="/views/layouts/js/moment.js"></script>
<script src="/views/layouts/js/bootstrap.min.js"></script>
<script src="/views/layouts/js/bootstrap-datetimepicker.min.js"></script>
<script src="/views/layouts/js/common.js"></script>
