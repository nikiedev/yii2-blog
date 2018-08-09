<?php

use yii\helpers\Url;
$this->title = 'Блог: События и Заявки. Редактирование';
?>
<div class="admin-default-index">
    <h1 class="text-info text-center panel">События и Заявки: Редактирование</h1>
    <article class="clearfix panel-body">
        <div class="col-sm-6 col-xs-12">
            <div class="btn-group text-center">
                <h2>События</h2>

                <p class="lead">Нажмите на ссылку ниже чтобы изменить, добавить или удалить событие.</p>

                <p><a class="btn btn-success" href="<?php echo Url::base();?>/admin/events/index">Редактировать</a></p>
            </div>
        </div>
        <div class="col-sm-6 col-xs-12">
            <div class="btn-group text-center">
                <h2>Заявки</h2>

                <p class="lead">Нажмите на ссылку ниже чтобы изменить, добавить или удалить заявку.</p>

                <p><a class="btn btn-success" href="<?php echo Url::base();?>/admin/bids/index">Редактировать</a></p>
            </div>
        </div>
    </article>

</div>
