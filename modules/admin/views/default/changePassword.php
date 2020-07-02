<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>
<div class="admin-default-index">
    <h1 class="text-center">Изменение пароля</h1>

    <?php $form=ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-5\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-3 control-label'],
            ]
    ]) ?>
    <?= $form->field($modelNew, 'password_repeat')->passwordInput()->label('Пароль') ?>
    <?= $form->field($modelNew, 'password')->passwordInput()->label('Повторить') ?>




    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Изменить', ['class' => '', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>


