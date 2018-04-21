<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Bright;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;

$FishCategory = Bright::find()->all();
$FishCategoryArray = ArrayHelper::map($FishCategory, 'id', 'name');

/* @var $this yii\web\View */
/* @var $model app\models\BarangBright */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-bright-form">

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
    <?= $form->field($model, 'bright_id')->dropDownList($FishCategoryArray, ['prompt'=>'Pilih Lokasi Bright']); ?>

    <?= $form->field($model, 'harga')->textInput() ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
