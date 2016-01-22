<?php
namespace backend\controllers;

use Yii;
/**
 * 学生审核管理
 */
class StudentauditController extends BaseController
{
       /**
     * 学生信息审核
     */
    public function actionInfo()
    {
        return $this->render('info');
    }
    /**
     * 申请限额审核
     */
    public function actionQuota()
    {
        return $this->render('quota');
    }
}