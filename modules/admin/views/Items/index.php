<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\MainGroup;
use app\models\SubGroup;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ItemsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Items';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="items-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Items', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Loade Price', ['loadeprice'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'vendor',
            //'main_group',
            [
                'attribute'=>'main_group.title',
                'format'=>'raw',
                'label'=>'Main Group',
                'value'=>function($id)
                {
                    $data= new MainGroup();
                  return $data->getMaingroupNameById($id->main_group);
                }
              ],
            //'sub_group',
            [
                'attribute'=>'sub_group.title',
                'format'=>'raw',
                'label'=>'Sub Group',
                'value'=>function($id)
                {
                    $dataSub= new SubGroup();
                  return $dataSub->getSubgroupNameById($id->sub_group);
                }
              ],
            'item',
            'price',
            'pur_price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
