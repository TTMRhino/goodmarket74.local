<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "main_group".
 *
 * @property int $id
 * @property string|null $title
 */
class MainGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'main_group';
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

    public function getMaingroupNameById($id){      
        $model=$this::find()->where(['id'=>$id])->one();     
        return $model->title;
    }

    public function getMaingroupIdByName($title){      
        $model=$this::find()->where(['title'=>$title])->one();     
        return $model->id;
    }
}
