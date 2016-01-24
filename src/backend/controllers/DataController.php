<?php
namespace backend\controllers;

use Yii;
/**
 * 数据管理
 */
class DataController extends BaseController
{
    /**
     * 公共数据管理
     */
    public function actionCommon()
    {
        return $this->render('common');
    }

    /**
     * 学生数据管理
     */
    public function actionStu()
    {
        return $this->render('stu');
    }

    /**
     * 商家数据管理
     */
    public function actionMer()
    {
        return $this->render('mer');
    }
    
}