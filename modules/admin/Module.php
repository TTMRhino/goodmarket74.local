<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    public function behaviors(){
         
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                  'except' => ['index'], // на эти действия правила не распространяются
                  'rules' => [
                    [                    
                        'allow' => true,
                        'roles' => ['@'],
                    ],  
                    [
                       'allow' => true,
                       'controllers' => ['admin/default'],
                       'actions' => ['index'],
                   ],                
               ],
           ],
   
           
       ];
   }

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
