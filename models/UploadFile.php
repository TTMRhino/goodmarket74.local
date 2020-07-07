<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use app\models\MainGroup;
use app\models\SubGroup;
use app\models\Item;


class  UploadFile extends Model
{
    public $file;   


    public function rules()
    {
        return [
            [['file'],'required'],
            [['file'],'file'],
        ];
    }

    public function getJson()
    {
         
        $xml_file=file_get_contents($this->file->tempName);
        $json = json_decode($xml_file,true);   
       
         if (empty($json)){
            return "error"; //если json поврежден
         }
        
        $main_group = new MainGroup();
        $sub_group = new SubGroup();
        $new_vendor = new Items();
        foreach($json["list"] as $item){             

          $exist_item =  $new_vendor->getItemByVendor($item["vendor"]);//ищем запись по артиклу

          $main_id=$main_group->getMaingroupIdByName($item["main_group"]);//находим id основной группы по имени
          $sub_id=$sub_group->getSubgroupIdByName($item["sub_group"]);//находим id подгруппы по имени

         (empty($main_id)) ? $main_id = 16: "";
         //если под группы не совпали
         (empty(sub_id)) ? $sub_id = 63: "";
         

          //формируем цену
          $pur_price = $item["price"];
          $price = round(($pur_price * 30 / 100),0);
          $price = ceil($pur_price+ $price);

          if ((!empty($exist_item))){
            //нашли запись приступаем к update          

            $exist_item->main_group = $main_id;
            $exist_item->sub_group = $sub_id; 
            $exist_item->pur_price = $pur_price;           
            $exist_item->price = $price;            
            $exist_item->update();

            //echo "Update = ".$exist_item->vendor;

          }else {
            $new_item = new Items();

            $new_item->main_group = $main_id;
            $new_item->sub_group = $sub_id;
            $new_item->vendor = $item["vendor"];
            $new_item->item = $item["item"];
            $new_item->price = $price;
            $new_item->pur_price = $pur_price;
            $new_item->save();

            //echo "New Item = ".$item["vendor"]; 
          }       
   
         }

        return $json;
    }
    
}
?>
