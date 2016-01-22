<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
/**
 * 关于我们
 */
class AboutController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
