<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\RewardCategory;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\RewardItem */

$Object = RewardCategory::find()->all();
$objectArray = ArrayHelper::map($Object, 'id', 'name');

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Reward Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reward-item-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            [
                'attribute'=>'image',
                'format' => 'html',
                'value' => function ($data){
                    return Html::img(Yii::$app->request->baseUrl . '/'. $data['image'], ['height' => '80px']);
                },
                'headerOptions' => ['style' => 'width:100px;'],
            ],
            'name',
            [
                'attribute'=>'reward_cat',
                'value' => function ($data){
                    $object  = RewardCategory::find()->where(['id' => $data['reward_cat']])->one();
                    return $object->name;
                },
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'prompt'=>'Pilih Lokasi Distribusi',
                ],
                'filter'=> $objectArray,
                // 'headerOptions' => ['style' => 'width:20%'],
            ],
            'date',
            'overview:ntext',
            'how_to_use:ntext',
            'term_and_condition:ntext',
            [
                'attribute'=>'point',
                'value' => function ($data){
                    return $data['point'] . " Points";
                },
                // 'headerOptions' => ['style' => 'width:20%'],
            ],
        ],
    ]) ?>

</div>
