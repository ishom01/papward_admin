<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RewardCategory */

$this->title = 'Tambah Kategori Reward';
$this->params['breadcrumbs'][] = ['label' => 'Reward Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reward-category-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
