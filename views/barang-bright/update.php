<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangBright */

$this->title = 'Update Barang Bright: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Barang Brights', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-bright-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
