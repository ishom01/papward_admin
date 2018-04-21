<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RewardCategory;
use yii\helpers\ArrayHelper;
use kartik\widgets\FileInput;
use kartik\widgets\DatePicker;

$FishCategory = RewardCategory::find()->all();
$FishCategoryArray = ArrayHelper::map($FishCategory, 'id', 'name');

/* @var $this yii\web\View */
/* @var $model app\models\RewardItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reward-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- <?= $form->field($model, 'reward_cat')->textInput() ?> -->
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

    <?= $form->field($model, 'reward_cat')->dropDownList($FishCategoryArray, ['prompt'=>'Pilih Reward Kategori']); ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Pilih tanggal...'],
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                    'autoclose'=>true,
                    'todayHighlight' => true,
                    'format' => 'yyyy-mm-dd'
                ]
            ]);
        ?>
    <?= $form->field($model, 'overview')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'how_to_use')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'term_and_condition')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'point')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
