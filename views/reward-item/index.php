<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\RewardCategory;
use yii\helpers\ArrayHelper;

$Object = RewardCategory::find()->all();
$objectArray = ArrayHelper::map($Object, 'id', 'name');

/* @var $this yii\web\View */
/* @var $searchModel app\models\RewardItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Item Reward';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reward-item-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php

    ?>

    <p>
        <?= Html::a('Create Reward Item', ['create'], ['class' => 'btn btn-success']) ?>
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
                'headerOptions' => ['style' => 'width:100px;'],
            ],
            'name',
            // 'reward_cat',
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
            //'overview:ntext',
            //'how_to_use:ntext',
            //'term_and_condition:ntext',
            [
                'attribute'=>'point',
                'value' => function ($data){
                    return $data['point'] . " Points";
                },
                // 'headerOptions' => ['style' => 'width:20%'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
