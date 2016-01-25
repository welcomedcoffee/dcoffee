<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
/**
 * 用户控制台
 */
class PublicController extends BaseController
{

	public function actionLogin()
    {
        return $this->render('login');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}