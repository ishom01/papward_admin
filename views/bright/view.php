<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bright */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Brights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bright-view">

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
            'phone',
            [
                'attribute' => 'type',
                'format' => 'html',
                'value' => function ($data){
                    if ($data['type'] == 1){
                        return "<p style='color:green;'>Bright Store</p>";
                    }
                    elseif ($data['type'] == 2){
                        return "<p style='color:orane;'>Bright Caffe</p>";
                    }
                    elseif ($data['type'] == 3){
                        return "<p style='color:blue;'>Bright Wash</p>";
                    }
                },
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'prompt'=>'Pilih Type',
                ],
                'filter'=>array(1 =>"Bright Store", 2 =>"Bright Caffe", 3 => "Bright Wash"),
            ],
        ],
    ]) ?>

</div>
