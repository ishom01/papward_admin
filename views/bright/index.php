<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BrightSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Lokasi Bright';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bright-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tambah Bright', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div id="map_canvas" class="mapping" style="margin-bottom:20px;"></div>


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
                    return Html::img(Yii::$app->request->baseUrl . '/'. $data['image'], ['width' => '88px','height' => '88px']);
                },
                'headerOptions' => ['style' => 'width:92px;'],
            ],
            'name',
            'address:ntext',
            // 'lat',
            //'lng',
            //'phone',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDIB9n26M5MbDXtw-Hd1pUyh8M1xJHjBI0&sensor=false&callback=initialize"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="http://localhost/papward/web/js/setMaps.js" ></script>
    <script type="text/javascript">
      getAllBright();
    </script>

</div>
