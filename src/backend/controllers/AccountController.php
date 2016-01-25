<?php
namespace backend\controllers;

use Yii;
/**
 * 账户管理
 */
class AccountController extends BaseController
{
     /**
     * 收入支出数据
     */
    public function actionIncome()
    {
        return $this->render('income');
    }
     /**
     * 返款确认
     */
     public function actionRepayment()
    {
        return $this->render('repayment');
    }
}