<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SpbuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spbu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'image') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'lat') ?>

    <?php // echo $form->field($model, 'lng') ?>

    <?php // echo $form->field($model, 'toilet') ?>

    <?php // echo $form->field($model, 'musholla') ?>

    <?php // echo $form->field($model, 'restarea') ?>

    <?php // echo $form->field($model, 'tambal_ban') ?>

    <?php // echo $form->field($model, 'pomp_bensin') ?>

    <?php // echo $form->field($model, 'bright_store') ?>

    <?php // echo $form->field($model, 'service') ?>

    <?php // echo $form->field($model, 'bright_cafe') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
