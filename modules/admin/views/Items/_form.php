<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MainGroup;
use app\models\SubGroup;

/* @var $this yii\web\View */
/* @var $model app\models\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vendor')->textInput() ?>

    
    
    <?= $form->field($model, 'main_group')->dropDownList(
      \yii\helpers\ArrayHelper::map(MainGroup::find()->all(), 'id', 'title')
      ) ?>

    <?= $form->field($model, 'sub_group')->dropDownList(
      \yii\helpers\ArrayHelper::map(SubGroup::find()->all(), 'id', 'title')
      ) ?>

    

    <?= $form->field($model, 'item')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'pur_price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
