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
            [['price','pur_price'], 'number'],
            [['main_group', 'sub_group'], 'string', 'max' => 130],
            [['item'], 'string', 'max' => 150],
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
            'pur_price' => 'Purchase Price',
        ];
    }

    public function getItemByVendor($vendor)
    {
        return $this::find()->where(['vendor'=>$vendor])->one();  
    }
}
