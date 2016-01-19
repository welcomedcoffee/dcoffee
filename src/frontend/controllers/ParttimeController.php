<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * 兼职机会
 */
class ParttimeController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
