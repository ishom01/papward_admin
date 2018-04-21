<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RewardCategory */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Reward Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reward-category-view">

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
                    return Html::img(Yii::$app->request->baseUrl . '/'. $data['image'], ['width' => '200px','height' => '1=200px']);
                },
                'headerOptions' => ['style' => 'width:200px;'],
            ],
            'name',

        ],
    ]) ?>

</div>
