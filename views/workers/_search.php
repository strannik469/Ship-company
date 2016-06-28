<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WorkersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="workers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'tabelNumber') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'surname') ?>

    <?= $form->field($model, 'secondName') ?>

    <?= $form->field($model, 'post') ?>
	
	<?php // echo $form->field($model, 'dateBirthday') ?>

    <?php // echo $form->field($model, 'idPost') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'telHome') ?>

    <?php // echo $form->field($model, 'telWork') ?>

    <?php // echo $form->field($model, 'firedStatus') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
