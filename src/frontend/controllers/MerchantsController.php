<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
/**
 * 优质商家
 */
class MerchantsController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
