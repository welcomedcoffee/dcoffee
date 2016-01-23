<?php
namespace backend\controllers;

use Yii;
/**
 * 任务管理
 */
class TaskController extends BaseController
{
    /**
     * 发布任务(超级管理员)
     */
    public function actionRelease()
    {   
        return $this->render('release');
    }

    /**
     * 查看任务(普通管理员)
     */
    public function actionCat()
    {
        return $this->render('cat');
    }
}
