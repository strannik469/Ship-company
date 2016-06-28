<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccessSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="access-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idType') ?>

    <?= $form->field($model, 'dateStart') ?>

    <?= $form->field($model, 'dateEnd') ?>

    <?= $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'idWorkers') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
