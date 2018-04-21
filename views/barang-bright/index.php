<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Bright;
use yii\helpers\ArrayHelper;

$Object = Bright::find()->all();
$objectArray = ArrayHelper::map($Object, 'id', 'name');

/* @var $this yii\web\View */
/* @var $searchModel app\models\BarangBrightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Barang Bright';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-bright-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Barang Bright', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>'image',
                'format' => 'html',
                'value' => function ($data){
                    return Html::img(Yii::$app->request->baseUrl . '/'. $data['image'], ['height' => '80px']);
                },
                'headerOptions' => ['style' => 'width:120px;'],
            ],
            'name',
            [
                'attribute'=>'bright_id',
                'value' => function ($data){
                    $object  = Bright::find()->where(['id' => $data['bright_id']])->one();
                    return $object->name;
                },
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'prompt'=>'Pilih Lokasi Bright',
                ],
                'filter'=> $objectArray,
                'headerOptions' => ['style' => 'width:20%'],
            ],
            'harga',
            'stock',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
