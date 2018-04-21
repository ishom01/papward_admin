<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserPenggunaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar 10 Terbaik User Pengguna';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-pengguna-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            [
                'attribute'=>'image',
                'format' => 'html',
                'value' => function ($data){
                    return Html::img(Yii::$app->request->baseUrl . '/'. $data['image'], ['width' => '68px','height' => '68px']);
                },
                'headerOptions' => ['style' => 'width:100px;'],
            ],
            'username',
            'phone',
            [
                'attribute'=>'point',
                'value' => function ($data){
                    $berat = $data['point'] . " Points";
                    return $berat;
                }
                // 'headerOptions' => ['style' => 'width:20%'],
            ],
            //'pin',
            //'ver_code',
            [
                'attribute' => 'status',
                'format' => 'html',
                'value' => function ($data){
                    if ($data['status'] == 0){
                        return "<p style='color:red;'>Not Verified</p>".
                        Html::a('Aktifasi', ['aktifasi', 'id' => $data['id']],
                        [
                            'class' => 'btn btn-success',
                            'data' => [
                                'confirm' => 'Apa Benar kamu akan verifikasi pembayaran ini ?',
                                'method' => 'post',
                            ],
                        ]);
                    }
                    elseif ($data['status'] == 1){
                        return "<p style='color:green;'>Verified</p>";
                    }
                },
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'prompt'=>'Pilih Status',
                ],
                'filter'=>array( 0 =>"Not Verified", 1 =>"Verified"),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
