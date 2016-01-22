<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 * 兼职机会
 */
class ParttimeController extends BaseController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
