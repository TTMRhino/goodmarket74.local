<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\User;
use app\models\LoginForm;
use Yii;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{


    public $layout = '@app/modules/admin/views/layouts/main.php';


  
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {

            return $this->render('index');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login() ) {


            return $this->redirect('/admin/default/index');
        }


        return $this->render('login', compact('model'));
    }


    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect('/admin');
    }

    public function actionChangePassword()
    {
        $modelNew = new User();
        $modelOld =new User();
        $modelOld=$modelOld::findIdentity(1);

        if($modelNew->load(Yii::$app->request->post()) ){

            $options = [
                'cost' => 12,
            ];

            $hash=password_hash($modelNew->password, PASSWORD_BCRYPT,$options);
            $modelOld->password=$hash;

            $modelOld->save(false);

            Yii::$app->session->setFlash('success', 'Пароль изменен!');
            return $this->redirect('/admin/default/index');
        }
        return $this->render('changePassword',compact('modelNew'));
    }
}
