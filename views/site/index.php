<?php

/* @var $this yii\web\View */
use rhosocial\lottery\models\lottery\welfare\DoubleColor\Lottery;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Lottery Collectors.</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <?php foreach (Lottery::extractFromSource(['periods' => 20]) as $record) {
                    var_dump($record->getOpenNumbers());
                    Lottery::updateLottery($record->getPeriod(), $record->opencode, $record->opentime);
                } ?>
            </div>
            <div class="col-lg-4">
            </div>
            <div class="col-lg-4">
            </div>
        </div>

    </div>
</div>
