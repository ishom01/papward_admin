<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserPengguna */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User Penggunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-pengguna-view">


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
                    return Html::img(Yii::$app->request->baseUrl . '/'. $data['image'], ['width' => '120px','height' => '120px']);
                },
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
        ],
    ]) ?>

</div>
