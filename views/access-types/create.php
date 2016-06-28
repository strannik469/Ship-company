<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AccessTypes */

$this->title = 'Create Access Types';
$this->params['breadcrumbs'][] = ['label' => 'Access Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="access-types-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
