<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Блог: Мероприятия и Заявки';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>События и Заявки</h1>

        <p class="lead">Это простой блог событий и заявок.</p>

        <p><a class="btn btn-lg btn-success" href="<?php echo Url::base();?>/admin/default/index">Редактировать</a></p>
    </div>

    <div class="body-content">

        <div class="row">

            <div class="clearfix events-bids-all">
                <div class="col-sm-6 col-xs-12">
                    <h2>События</h2>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название события</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($events as $event): ?>
                            <tr>
                                <td><?= $event['id']; ?></td>
                                <td><?= $event['caption']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <h2>Заявки</h2>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>ID события</th>
                            <th>Имя участника</th>
                            <th>Почта</th>
                            <th>Цена за билет</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($bids as $bid): ?>
                        <tr>
                            <td><?= $bid['id']; ?></td>
                            <td><?= $bid['id_event']; ?></td>
                            <td><?= $bid['name']; ?></td>
                            <td><?= $bid['email']; ?></td>
                            <td><?= $bid['price']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <h2>Победитель</h2>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Имя пользователя с самой высокой ценой заявки</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><?= $bidMaxPriceUserName; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <h2>Популярное мероприятие</h2>
                    <table class="table table-hover table-bordered">
                        <thead>
                        <tr>
                            <th>Название мероприятия по которому больше трех заявок</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($eventMoreThanNum as $ev_name): ?>
                        <tr>
                            <td><?= $ev_name['caption']; ?></td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="clearfix">
                <div class="col-sm-6 col-xs-12">
                    <p>
                        <a href="<?php echo Url::base();?>/admin/events/index">
                            <img class="img-responsive" src="<?php echo Yii::getAlias('@web') . '/images/';?>sobytiya.jpg" alt="события">
                        </a>
                    </p>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <p>
                        <a href="<?php echo Url::base();?>/admin/bids/index">
                            <img class="img-responsive" src="<?php echo Yii::getAlias('@web') . '/images/';?>zayavka.jpg" alt="заявки">
                        </a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
