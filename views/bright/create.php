<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Bright */

$this->title = 'Tambah Lokasi Bright';
$this->params['breadcrumbs'][] = ['label' => 'Brights', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bright-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
