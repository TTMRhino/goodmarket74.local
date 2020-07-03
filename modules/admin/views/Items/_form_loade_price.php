<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\MainGroup;
use app\models\SubGroup;

?>

<div class="items-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    
    <?= $form->field($upload_model, 'file')->fileInput() ?>
    
    
    

    <div class="form-group">
        <?= Html::submitButton('Load', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
