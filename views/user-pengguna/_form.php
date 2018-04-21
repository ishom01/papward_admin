<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserPengguna */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-pengguna-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?> -->

    <!-- <?= $form->field($model, 'point')->textInput() ?> -->

    <?= $form->field($model, 'pin')->passwordInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'ver_code')->textInput() ?> -->

    <!-- <?= $form->field($model, 'status')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
