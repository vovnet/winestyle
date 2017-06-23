<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Отображаемая валюта</h2>

            <form action="/course/" method="post">
                <div class="radio">
                    <label><input type="radio" name="currency" value="rus"
                            <?php if ($isRub): ?>
                                checked
                            <?php endif; ?>
                            >Рубли</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="currency" value="eng"
                            <?php if (!$isRub): ?>
                                checked
                            <?php endif; ?>
                            >Доллары</label>
                </div>
                <div class="form-group">
                    <label for="usr">Курс:</label>
                    <input type="text" class="form-control" name="rate" id="usr" value="<?= $rate; ?>">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>