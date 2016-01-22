<?php
/**
 * Created by PhpStorm.
 * User: 王明东
 * Date: 2016/1/21
 * Time: 14:00
 */
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * 我的门店首页
 */
class MystoreController extends Controller
{
    /* 兼职门店首页 */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /* 发布兼职 */
    public function actionPart()
    {
        return $this->render("part");
    }

    /* 兼职列表 */
    public function actionPartlist()
    {
        return $this->render("partlist");
    }

    /* 兼职评论 */
    public function actionPartcomment()
    {
        return $this->render("partcomment");
    }

}