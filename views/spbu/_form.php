<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;


/* @var $this yii\web\View */
/* @var $model app\models\Spbu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="spbu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->widget(FileInput::classname(), [
            // 'type' => FileInput::TYPE_INPUT,
            'options' => ['accept' => 'image/*'],
            'pluginOptions'=>[
                'allowedFileExtensions'=>['jpg','gif','png'],
                'showUpload' => false,
                'showRemove' => false,
            ],
        ]);
    ?>
    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lng')->textInput(['maxlength' => true]) ?>

    <!-- <?= $form->field($model, 'toilet')->textInput() ?> -->

    <?= $form->field($model, 'toilet')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <?= $form->field($model, 'musholla')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <?= $form->field($model, 'restarea')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <?= $form->field($model, 'tambal_ban')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <?= $form->field($model, 'pomp_bensin')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <?= $form->field($model, 'bright_store')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <?= $form->field($model, 'service')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <?= $form->field($model, 'bright_cafe')->dropDownList([ '1' => 'Ada', '0' => 'Tidak Ada'], ['prompt' => 'Pilih Ketersediaan']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
