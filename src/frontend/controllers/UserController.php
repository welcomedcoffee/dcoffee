<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * 用户
 */
class UserController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
