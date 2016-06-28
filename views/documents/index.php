<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documents';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documents-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Documents', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'idType',
            'series',
            'number',
            'dateOfIssue',
            // 'dateEnd',
            // 'issuedBy',
            // 'idWorkers',
				[
    'attribute'=>'idType',
    'value'=>'type.type',
	
],

[
    'attribute'=>'idWorkers',
    'value'=>'surname.surname',
],


[
    'attribute'=>'idWorkers',
    'value'=>'name.name',
],

[
    'attribute'=>'idWorkers',
    'value'=>'secondName.secondName',
],




            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
