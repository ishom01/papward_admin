<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BarangBright */

$this->title = 'Tambah Barang Bright';
$this->params['breadcrumbs'][] = ['label' => 'Barang Brights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-bright-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
