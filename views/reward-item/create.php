<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RewardItem */

$this->title = 'Tambah Item Reward';
$this->params['breadcrumbs'][] = ['label' => 'Reward Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reward-item-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
