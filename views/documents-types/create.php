<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DocumentsTypes */

$this->title = 'Create Documents Types';
$this->params['breadcrumbs'][] = ['label' => 'Documents Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
