<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Новый сотрудник</h2>
            <?php if ($exist && $success): ?>
                <div class="alert alert-success">
                    Новый сотрудник был успешно добавлен!
                </div>
            <?php endif ?>
            <?php if ($exist && !$success): ?>
                <div class="alert alert-danger">
                    <strong>Ошибка!</strong> Неверно введены данные.
                </div>
            <?php endif; ?>

            <form enctype="multipart/form-data" action="/worker/add" method="POST">
                <div class="form-group">
                    <label for="firstname">Имя:</label>
                    <input type="firstname" class="form-control" id="firstname" name="firstname">
                </div>
                <div class="form-group">
                    <label for="lastname">Фамилия:</label>
                    <input type="lastname" class="form-control" id="lastname" name="lastname">
                </div>
                <div class="form-group">
                    <label for="prof">Профессия:</label>
                    <select class="form-control" id="prof" name="prof">
                        <?php foreach ($professions as $prof): ?>
                            <option><?= $prof['prof']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="salary">Зарплата:</label>
                    <input type="number" class="form-control" id="salary" name="salary">
                </div>
                <div class="form-group">
                    <input type="hidden" name="MAX_FILE_SIZE" value="3000000"/>
                    <label for="photo">Прикрепить фото:</label>
                    <input name="photo" type="file"/>
                </div>
                <input type="submit" class="btn btn-default" value="Добавить"/>
            </form>


        </div>
    </div>
</div>
