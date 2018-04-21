<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPengguna */

$this->title = 'Update Data : ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'User Penggunas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-pengguna-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
