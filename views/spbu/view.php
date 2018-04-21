<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Spbu */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Spbus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="spbu-view">

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
            'address:ntext',
            // 'lat',
            // 'lng',
            [
                'attribute' => 'toilet',
                'value' => function ($data){
                    if ($data['toilet'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
            [
                'attribute' => 'musholla',
                'value' => function ($data){
                    if ($data['musholla'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
            [
                'attribute' => 'restarea',
                'value' => function ($data){
                    if ($data['restarea'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
            [
                'attribute' => 'tambal_ban',
                'value' => function ($data){
                    if ($data['tambal_ban'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
            [
                'attribute' => 'pomp_bensin',
                'value' => function ($data){
                    if ($data['pomp_bensin'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
            [
                'attribute' => 'bright_store',
                'value' => function ($data){
                    if ($data['bright_store'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
            [
                'attribute' => 'service',
                'value' => function ($data){
                    if ($data['service'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
            [
                'attribute' => 'bright_cafe',
                'value' => function ($data){
                    if ($data['bright_cafe'] == 1){
                        return "Ada";
                    }
                    else{
                        return "Tidak Ada";
                    }
                },
            ],
        ],
    ]) ?>

</div>
