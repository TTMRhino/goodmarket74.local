<?php
namespace app\controllers;  

use yii\rest\ActiveController;
use yii\filters\ContentNegotiator;
use yii\web\Response;
use app\models\Subgroup;
use yii\data\ActiveDataProvider;



class SubgroupController extends ActiveController
{   
    public $modelClass ="app\models\SubGroup"; 
     
   
    public function behaviors()
    {  
         	
        $behaviors = parent::behaviors();
      
        $behaviors= [
        [
            'class' => \yii\filters\Cors::class,
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
               // Allow  methods
                    'Access-Control-Request-Method' => ['POST', 'PUT', 'OPTIONS', 'GET'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Headers' => ['Content-Type'],
                    // Allow credentials (cookies, authorization headers, etc.) to be exposed to the browser
                    //'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 3600,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => ['*'],
                ],
                
            ],
            [
                'class' => ContentNegotiator::className(),
                'formats' => 
                [
                    'application/json' => Response::FORMAT_JSON,                   
                ]
            ]
        ];
       
        return $behaviors;
    }  


    public function actions()
    {
        $actions = parent::actions();     
        unset($actions['index']);    

        return $actions;

    }

    public function actionIndex($id=1)    
    {     
        
        return new ActiveDataProvider([
            'query' => Subgroup::find()->where(['id' => $id]),
        ]);
    }

  
    
}
   
?>