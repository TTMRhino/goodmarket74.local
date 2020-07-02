<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MainGroup */

$this->title = 'Create Main Group';
$this->params['breadcrumbs'][] = ['label' => 'Main Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
