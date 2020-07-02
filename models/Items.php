<?php

namespace app\models;

use Yii;

class Items extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'items';
    }

   
    public function rules()
    {
        return [
            [['vendor'], 'integer'],
            [['price'], 'number'],
            [['main_group', 'sub_group'], 'string', 'max' => 30],
            [['item'], 'string', 'max' => 50],
        ];
    }

   
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor' => 'Vendor',
            'main_group' => 'Main Group',
            'sub_group' => 'Sub Group',
            'item' => 'Item',
            'price' => 'Price',
        ];
    }
}
