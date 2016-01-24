<?php
namespace backend\controllers;

use Yii;
/**
 * 管理员中心
 */
class CenterController extends BaseController
{
    /**
     * 欢迎界面
     */
    public function index()
    {
        return $this->render('index');  
    }
}
