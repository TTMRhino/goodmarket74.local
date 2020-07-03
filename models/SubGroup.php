<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_group".
 *
 * @property int $id
 * @property string|null $title
 */
class SubGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    public function getSubgroupNameById($id)
    {
        $model=$this::find()->where(['id'=>$id])->one();    
        return $model->title;        
    }

    public function getSubgroupIdByName($title)
    {
        $model=$this::find()->where(['title'=>$title])->one();    
        return $model->id;        
    }
}
