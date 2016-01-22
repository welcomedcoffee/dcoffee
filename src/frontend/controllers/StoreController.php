<?php
/**
 * Created by PhpStorm.
 * User: 解科
 * Date: 2016/1/22
 * Time: 14:00
 */
namespace frontend\controllers;

use Yii;
use yii\web\Controller;

/**
 *  门店
 */
class StoreController extends BaseController
{
	/* 门店首页 */
    public function actionIndex()
    {
        return $this->render('index');
    }


}