<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
/**
 * 安全保障
 */
class SafetyController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
