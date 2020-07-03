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
      //  $this->file=$file;        
     
        $xml_file=file_get_contents($this->file->tempName);
        $json = json_decode($xml_file,true);   
        
        
        
        $main_group = new MainGroup();
        $sub_group = new SubGroup();
        $items = new Items();
        foreach($json["list"] as $item){   
            
            $main_id=$main_group->getMaingroupIdByName($item["main_group"]);//находим id основной группы по имени
            $sub_id=$sub_group->getSubgroupIdByName($item["sub_group"]);//находим id подгруппы по имени

          $find_vendor =  $items->getItemByVendor($item["vendor"]);

          if (!is_null($find_vendor)){
            echo "совпал = ".$find_vendor->vendor;
          }else {
            echo "НЕсовпал = ".$item["vendor"]; 
          }       

          //Продожить от сюдова!
           
             
         }

        return $json;
    }

    

    

    
}
?>
